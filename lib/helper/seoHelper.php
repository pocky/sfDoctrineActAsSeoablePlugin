<?php

function seoTitle($object, $options = array())
{
  
  if($object)
  {
    return slot('title', sprintf($object)); 
  }
  else
  {
    return null;
  }
  
}

function seoDescription($object, $options = array())
{
  $object = $object->getPeanutSeo()->getDescription();
  
  if($object)
  {
    return slot('description', sprintf($object)); 
  }
  else
  {
    return null;
  }
  
}

function seoKeywords($object, $options = array())
{
  $object = $object->getPeanutSeo()->getKeywords();
  
  if($object)
  {
    return slot('keywords', sprintf($object)); 
  }
  else
  {
    return null;
  }
  
}

function seoIndex($object)
{
  $indexable = $object->getPeanutSeo()->getIsIndexable();
  $followable = $object->getPeanutSeo()->getIsFollowable(); 
  
  if($indexable && $followable)
  {
    return slot('robots', sprintf('index, follow')); 
  }
  elseif($indexable && !$followable)
  {
    return slot('robots', sprintf('index, nofollow'));
  }
  elseif(!$indexable && $followable)
  {
    return slot('robots', sprintf('noindex, follow'));
  }
  else
  {
    return slot('robots', sprintf('noindex, nofollow'));
  }
}