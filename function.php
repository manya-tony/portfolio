<?php

// ==========================================
// サニタイズ
// ==========================================
function sanitize($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}