<?php

App::uses('AppModel', 'Model');

class User extends AppModel
{
    public $name = 'User';

	public $validate = [
        'username' => [
            'required' => [
                'rule' => ['notBlank'],
                'message' => 'Um email é obrigatório.'
            ]
        ],
		'name' => [
            'required' => [
                'rule' => ['notBlank'],
                'message' => 'Um nome é obrigatório.'
            ]
        ],
		'nickname' => [
            'required' => [
                'rule' => ['notBlank'],
                'message' => 'Um nome de usuário é obrigatório.'
            ]
        ],
        'password' => [
            'required' => [
                'rule' => ['notBlank'],
                'message' => 'Uma senha é obrigatória.'
            ]
        ],
    ];

	public function beforeSave($options = array())
	{
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
}
