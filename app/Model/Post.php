<?php

class Post extends AppModel {
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty',
            'message' => 'ああ空じゃ駄目なの'
            ),
        'body' => array(
            'rule' => 'notEmpty'
            )
        );

}