<?php

namespace frontend\components;

    interface iMessage
    {
        public function getContacts();
        public function getOrders($id = 0);
    }
