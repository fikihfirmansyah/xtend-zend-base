<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'user' => [
        'photo' => [
            'backup_dir' => 'data/photo'
        ],
        'email'  => [
            'welcome' => [
                'from' => 'noreply@genietree.biz',
                'name' => 'UMeShare',
                'subject'  => 'Welcome To UMeShare'
            ],
            'user_activation' => [
                'from' => 'noreply@genietree.biz',
                'name' => 'UMeShare',
                'subject' => 'UMeeShare - Account Activated'
            ],
            'reset_password' => [
                'from' => 'noreply@genietree.biz',
                'name' => 'UMeShare',
                'subject' => 'UMeeShare - Reset Password'
            ],
        ]
    ]
];
