<?php
namespace TymFrontiers\Helper;
\define('FILE_WRITER_PREPEND','prepend');
\define('FILE_WRITER_APPEND','append');

trait FileWriter{

  public function write(string $value, string $option = FILE_WRITER_PREPEND){
    return false;
  }
  public function writeLine( int $line, string $value){
    if( !\is_writable($this->fullPath()) || !\is_readable($this->fullPath()) ){
      $this->errors["writeLine"][] = [0,256,"Given file is either not readable or not writable.",__FILE__,__LINE__];
      return false;
    }
    $content = \file($this->fullPath());
    $content[$line] = $value;
    $content = \implode("",$content);
    \file_put_contents($this->fullPath(),$content);
    return true;
  }

}
