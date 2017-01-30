<?php
/**
 * Settings file : This page defines the major / global files & folders
 * 
 * This file is important to all pages changes can be made to constants if  the 
 * need arises 
 *
 * @author Ibrahim Isa & Abokor Djama
 * @version 1.0
 */

$system = new config();

//Deafault page url 
define('SU_DEFURL', $system->get_base_url());
//File Directory 
define('SU_DEFDIR', $system->pagDir());
//Include Folder Name
define('SU_INCLUDE_FLD',  SU_DEFDIR.'includes');
//Image Folder URL
define('SU_IMAGE_URL',    SU_DEFURL.'images');
//Style Folder URL
define('SU_STYLE_URL',    SU_DEFURL.'style');
//Style Folder URL
define('SU_SCRIPT_URL',   SU_DEFURL.'script');

