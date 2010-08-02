<?php


abstract class PluginpeanutSeoTable extends Doctrine_Table
{ 
  public static function getInstance()
  {
    return Doctrine_Core::getTable('peanutSeo');
  }
    
}