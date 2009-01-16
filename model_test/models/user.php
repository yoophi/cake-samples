<?php
class User extends AppModel {
	var $name = 'User';//for php4
    var $validate = array(
    	'username' => array(
			'email' => array(
				'rule' => 'email',
				'message' => '올바른 이메일 형식이 아닙니다.'
			),
			'checkUnique' => array(
				'rule' => array('checkUnique', 'username'),
				'message' => '이미 존재하는 아이디입니다.'
			)
		),
		'name' => array(
			'minlength' => array(
				'rule' => array('minLength', 6),
				'message' => '닉네임은 한글 2글자 이상으로이어야 합니다.'
			)
		),
        'passwd_confirm' => array(
            'minlength' => array(
                'rule' => array('minLength', 4),
                'message' => '패스워드는 4글자 이상으로 해주십시오'
                )
        ),
        'phone' => array(
            'rule' => array('phone', '/0\d{1,2}-\d{3,4}-\d{3,4}/'),
            'message' => '올바른 전화번호가 아닙니다.',
        ),
        'email' => array(
				'rule' => 'email',
				'message' => '올바른 이메일 형식이 아닙니다.'
			),

	);

        function addUser($userData) {/*{{{*/
            $userData['User']['phone'] = join('-', $userData['User']['phone']);
            if(!$this->validatePass($userData))
                return false;
            $userData['User']['level']  = 9;
            $userData['User']['active'] = 1;
            $userData['User']['join_date'] = $userData['User']['last_visit'] = date('Y-m-d H:i:s', mktime());
            if($this->save($userData)) {
                return true;
            } else {
                return false; 
            }
        }/*}}}*/

        function updateUser($userData) {/*{{{*/
            if(isset($userData['User']['phone']))
                $userData['User']['phone'] = join('-', $userData['User']['phone']);
            /*LAuth가 맘대로 인코딩함으로 인한 공백채크 */
            if($userData['User']['passwd'] == 'c74e38431eb07925dd1c2344dcf4d7f50d68c041')
                $userData['User']['passwd'] = '';
            if(!empty($userData['User']['passwd'])) {
                if(!$this->validatePass($userData))
                    return false;
            }
            foreach($userData['User'] as $key => $val) {
                if(empty($userData['User'][$key])) {
                    unset($userData['User'][$key]);
                    unset($this->validate[$key]);
                }
            }
            if($this->save($userData)) {
                return $userData;
            }
            else {
                return false;
            }
        }/*}}}*/

        function validatePass($userData) {/*{{{*/
            if($userData['User']['passwd'] != $this->encodePass($userData['User']['passwd_confirm'])) {
                $this->create($userData);
                $this->validates();
                $this->invalidate('passwd', '패스워드와 확인이 일치하지 않습니다.');
                return false;
            }
            return true;
        }/*}}}*/

        function encodePass($passwd) {/*{{{*/
            return Security::hash(Configure::read('Security.salt') . $passwd);
        }/*}}}*/

        function checkUnique($data, $fieldName) { /*{{{*/
            $valid = false;
            if(isset($fieldName) && $this->hasField($fieldName)) {
                $valid = $this->isUnique(array($fieldName => $data[$fieldName]));
            }
            return $valid;
        }/*}}}*/

        function deleteUser($user_id, $data) {/*{{{*/
            $this->unbindAll();
            $criteria = array(
                    'condition' => array('User.id' => $user_id),
                    'fields' => array('User.username', 'User.passwd')
                    );
            $userinfo = $this->find('first', $criteria);
            if($userinfo['User']['passwd'] == $data['User']['passwd'] && $userinfo['User']['username'] == $data['User']['username']) {
                $this->delete($user_id);
                return true;
            } else {
                return false;
            }
        }/*}}}*/

        function sendMail($email) {/*{{{*/
            $userid = Set::extract($this->find('first', array('conditions' => array('User.username' => $email), 'fields' => 'id')), 'User.id');
            if($userid) {
                App::import('Vendor', 'phpmailer', array('file' => 'class.phpmailer.php'));
                $mail = new PHPMailer;
                $mail->From = 'lexitech@lexitech.co.kr';
                $mail->FromName = 'lexitech';
                $mail->Subject = '비밀번호 변경용 임시 코드입니다.';
                $code = mktime();
                $mail->MsgHTML('임시코드: '.$code);
                $mail->AddAddress($email, 'lexitech');
                if(!$mail->Send()) {
                    $this->setErr('이메일을 보내지 못했습니다.');
                    return false;
                } else {
                    $tmp_data['User']['id'] = $userid;
                    $tmp_data['User']['mod_expire'] = date('Y-m-d H:i:s', strtotime('+20 minutes'));
                    $tmp_data['User']['mod_key'] = $code;
                    $this->save($tmp_data, false);
                    return true;
                }
            } else {
                $this->setErr('존재하지 않는 아이디 입니다.');
                return false;
            }
        }/*}}}*/

        function checkKey($data) {/*{{{*/
            $userData = $this->find('first', array('conditions' => array('User.username' => $data['User']['username']), 'fields' => array('id', 'mod_expire', 'mod_key')));

            if(!empty($userData)) {
                if($userData['User']['mod_key'] != $data['User']['mod_key']) {
                    $this->setErr('잘못된 코드값입니다. 다시 입력해주세요');
                    return false;
                }
                if((mktime() - strtotime($userData['User']['mod_expire'])) > 0) {
                    $this->setErr('기한이 지난 코드입니다.');
                    return false;
                }
                return $userData;
            } else {
                $this->setErr('존재하지 않는 아이디입니다.');
                return false;
            }
        }/*}}}*/

        function checkId($data) {
            foreach($this->validate as $key => $val) {
                if($key != 'username') {
                    unset($this->validate[$key]);
                }
            }
            $this->create($data);
            if(!$this->validates()) {
                return false;
            }
            return true;
        }

        function setErr($err_msg) {/*{{{*/
            $this->errMsg = $err_msg;
        }/*}}}*/

        function getErr() {/*{{{*/
            return $this->errMsg;
        }/*}}}*/
}
?>
