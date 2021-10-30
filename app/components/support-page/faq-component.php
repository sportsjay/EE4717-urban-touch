<?php
function createComponent($id, $title, $content)
{
  return "
  <div class='faq-component global-flex-column-wrapper'>
    <div class='faq-title global-flex-row-wrapper'>
      <span class='global-content-typography-subtitle'>$title</span>
      <span onclick='handleClick()' id='$id' class='global-content-typography-title'
        style='cursor:pointer; user-select:none'>&#43;</span>
    </div>
    <div id='content$id' style='display: none;' class='faq-content global-flex-row-wrapper'>
      <span class='global-content-typography-text'>
        $content</span>
    </div>
  </div>
  ";
}