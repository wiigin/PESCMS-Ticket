<?php
/**
 * PESCMS for PHP 5.4+
 *
 * Copyright (c) 2015 PESCMS (http://www.pescms.com)
 *
 * For the full copyright and license information, please view
 * the file LICENSE.md that was distributed with this source code.
 * @core version 2.8
 * @version 1.0
 */

namespace App\Form\GET;

class View extends \Core\Controller\Controller{


    /**
     * 查看工单的进度
     */
    public function ticket(){
        $content = \Model\Ticket::view();

        if($content['ticket']['ticket_model_login'] == 1 && empty($this->session()->get('member'))){
            $this->jump($this->url('Login-index', ['back_url' => base64_encode($_SERVER['REQUEST_URI'])]));
        }

        $this->assign($content['ticket']);
        $this->assign('form', $content['form']);
        $this->assign('chat', $content['chat']['list']);
        $this->assign('page', $content['chat']['page']);
        $this->layout();
    }

}