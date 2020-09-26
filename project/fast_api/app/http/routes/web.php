<?php

// --------------------------------------------------------------------------
// Web
// --------------------------------------------------------------------------

// 前台
require \hahaha\hahaha_application::Instance()->Root_ . '/app/http/routes/web/front.php';
// 後台
require \hahaha\hahaha_application::Instance()->Root_ . '/app/http/routes/web/backend.php';