<?php

require 'vendor/autoload.php';


$htmlString = '<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">
    <style type="text/css">
      html { font-family:Calibri, Arial, Helvetica, sans-serif; font-size:11pt; background-color:white }
      a.comment-indicator:hover + div.comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em }
      a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em }
      div.comment { display:none }
      table { border-collapse:collapse; page-break-after:always }
      .gridlines td { border:1px dotted black }
      .gridlines th { border:1px dotted black }
      .b { text-align:center }
      .e { text-align:center }
      .f { text-align:right }
      .inlineStr { text-align:left }
      .n { text-align:right }
      .s { text-align:left }
      td.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style1 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style1 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style2 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:3px solid #595959 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style2 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:3px solid #595959 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style3 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style3 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style4 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:3px solid #595959 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style4 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:3px solid #595959 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style5 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style5 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style6 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style6 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style7 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:3px solid #595959 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style7 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:3px solid #595959 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style8 { vertical-align:bottom; border-bottom:none #000000; border-top:3px solid #595959 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style8 { vertical-align:bottom; border-bottom:none #000000; border-top:3px solid #595959 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style9 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style9 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style10 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style10 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style11 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style11 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style12 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style12 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style13 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style13 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style14 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style14 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style15 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; text-decoration:underline; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style15 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; text-decoration:underline; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style16 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style16 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style17 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style17 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style18 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style18 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style19 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style19 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style20 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style20 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style21 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style21 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style22 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style22 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style23 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style23 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style24 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style24 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style25 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style25 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style26 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style26 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style27 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style27 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style28 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style28 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style29 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style29 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style30 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style30 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style31 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:12pt; background-color:#000000 }
      th.style31 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:12pt; background-color:#000000 }
      td.style32 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style32 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style33 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style33 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style34 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style34 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style35 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style35 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style36 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style36 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style37 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:3px solid #595959 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style37 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:3px solid #595959 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style38 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style38 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style39 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#595959 }
      th.style39 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#595959 }
      td.style40 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style40 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style41 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style41 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style42 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style42 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style43 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style43 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style44 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style44 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style45 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style45 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style46 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style46 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style47 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style47 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style48 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style48 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style49 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style49 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style50 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style50 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style51 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style51 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style52 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style52 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style53 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style53 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style54 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style54 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style55 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style55 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style56 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style56 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style57 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style57 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style58 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style58 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style59 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:12pt; background-color:#000000 }
      th.style59 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:12pt; background-color:#000000 }
      td.style60 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:12pt; background-color:#000000 }
      th.style60 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:12pt; background-color:#000000 }
      td.style61 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:12pt; background-color:#000000 }
      th.style61 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:12pt; background-color:#000000 }
      td.style62 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style62 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style63 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style63 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style64 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      th.style64 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
      td.style65 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style65 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style66 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style66 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style67 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style67 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style68 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style68 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style69 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:12pt; background-color:#000000 }
      th.style69 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:12pt; background-color:#000000 }
      td.style70 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:12pt; background-color:#000000 }
      th.style70 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:12pt; background-color:#000000 }
      td.style71 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:12pt; background-color:#000000 }
      th.style71 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:12pt; background-color:#000000 }
      td.style72 { vertical-align:middle; text-align:center; border-bottom:1px solid #595959 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style72 { vertical-align:middle; text-align:center; border-bottom:1px solid #595959 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style73 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style73 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style74 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#595959 }
      th.style74 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#595959 }
      td.style75 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#595959 }
      th.style75 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#595959 }
      td.style76 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style76 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style77 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style77 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style78 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style78 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style79 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style79 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style80 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style80 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style81 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style81 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style82 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style82 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style83 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Times New Roman'; font-size:28pt; background-color:#595959 }
      th.style83 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Times New Roman'; font-size:28pt; background-color:#595959 }
      td.style84 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #595959 !important; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri '; font-size:22pt; background-color:#595959 }
      th.style84 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #595959 !important; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri '; font-size:22pt; background-color:#595959 }
      td.style85 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri '; font-size:22pt; background-color:#595959 }
      th.style85 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri '; font-size:22pt; background-color:#595959 }
      td.style86 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#595959 }
      th.style86 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#595959 }
      td.style87 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style87 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style88 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style88 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style89 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style89 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style90 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:12pt; background-color:white }
      th.style90 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:12pt; background-color:white }
      td.style91 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:26pt; background-color:#595959 }
      th.style91 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#FFFFFF; font-family:'Calibri'; font-size:26pt; background-color:#595959 }
      td.style92 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#595959 }
      th.style92 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#595959 }
      table.sheet0 col.col0 { width:12.87777763pt }
      table.sheet0 col.col1 { width:8.13333324pt }
      table.sheet0 col.col2 { width:12.87777763pt }
      table.sheet0 col.col3 { width:12.87777763pt }
      table.sheet0 col.col4 { width:12.87777763pt }
      table.sheet0 col.col5 { width:12.87777763pt }
      table.sheet0 col.col6 { width:12.87777763pt }
      table.sheet0 col.col7 { width:12.87777763pt }
      table.sheet0 col.col8 { width:12.87777763pt }
      table.sheet0 col.col9 { width:12.87777763pt }
      table.sheet0 col.col10 { width:12.87777763pt }
      table.sheet0 col.col11 { width:12.87777763pt }
      table.sheet0 col.col12 { width:12.87777763pt }
      table.sheet0 col.col13 { width:12.87777763pt }
      table.sheet0 col.col14 { width:12.87777763pt }
      table.sheet0 col.col15 { width:12.87777763pt }
      table.sheet0 col.col16 { width:12.87777763pt }
      table.sheet0 col.col17 { width:12.87777763pt }
      table.sheet0 col.col18 { width:12.87777763pt }
      table.sheet0 col.col19 { width:12.87777763pt }
      table.sheet0 col.col20 { width:12.87777763pt }
      table.sheet0 col.col21 { width:12.87777763pt }
      table.sheet0 col.col22 { width:12.87777763pt }
      table.sheet0 col.col23 { width:12.87777763pt }
      table.sheet0 col.col24 { width:12.87777763pt }
      table.sheet0 col.col25 { width:12.87777763pt }
      table.sheet0 col.col26 { width:12.87777763pt }
      table.sheet0 col.col27 { width:12.87777763pt }
      table.sheet0 col.col28 { width:12.87777763pt }
      table.sheet0 col.col29 { width:12.87777763pt }
      table.sheet0 col.col30 { width:12.87777763pt }
      table.sheet0 col.col31 { width:12.87777763pt }
      table.sheet0 col.col32 { width:12.87777763pt }
      table.sheet0 col.col33 { width:12.87777763pt }
      table.sheet0 col.col34 { width:3.38888885pt }
      table.sheet0 col.col35 { width:12.87777763pt }
      table.sheet0 tr { height:15pt }
      table.sheet0 tr.row0 { height:16.5pt }
      table.sheet0 tr.row1 { height:5.25pt }
      table.sheet0 tr.row2 { height:9.75pt }
      table.sheet0 tr.row3 { height:5.25pt }
      table.sheet0 tr.row4 { height:15.75pt }
      table.sheet0 tr.row5 { height:3.75pt }
      table.sheet0 tr.row6 { height:6pt }
      table.sheet0 tr.row7 { height:14.25pt }
      table.sheet0 tr.row8 { height:7.5pt }
      table.sheet0 tr.row9 { height:15pt }
      table.sheet0 tr.row10 { height:4.5pt }
      table.sheet0 tr.row11 { height:15.75pt }
      table.sheet0 tr.row12 { height:15.75pt }
      table.sheet0 tr.row13 { height:4.5pt }
      table.sheet0 tr.row14 { height:13.5pt }
      table.sheet0 tr.row15 { height:2.25pt }
      table.sheet0 tr.row16 { height:15.75pt }
      table.sheet0 tr.row17 { height:11.1pt }
      table.sheet0 tr.row18 { height:11.1pt }
      table.sheet0 tr.row19 { height:11.1pt }
      table.sheet0 tr.row20 { height:11.1pt }
      table.sheet0 tr.row21 { height:11.1pt }
      table.sheet0 tr.row22 { height:11.1pt }
      table.sheet0 tr.row23 { height:11.1pt }
      table.sheet0 tr.row24 { height:11.1pt }
      table.sheet0 tr.row25 { height:11.1pt }
      table.sheet0 tr.row26 { height:11.1pt }
      table.sheet0 tr.row27 { height:11.1pt }
      table.sheet0 tr.row28 { height:11.1pt }
      table.sheet0 tr.row29 { height:11.1pt }
      table.sheet0 tr.row30 { height:4.5pt }
      table.sheet0 tr.row31 { height:3pt }
      table.sheet0 tr.row32 { height:14.25pt }
      table.sheet0 tr.row33 { height:8.25pt }
      table.sheet0 tr.row34 { height:15pt }
      table.sheet0 tr.row35 { height:9.75pt }
      table.sheet0 tr.row36 { height:14.25pt }
      table.sheet0 tr.row37 { height:10.5pt }
      table.sheet0 tr.row38 { height:15.75pt }
      table.sheet0 tr.row39 { height:15.75pt }
      table.sheet0 tr.row40 { height:15.75pt }
      table.sheet0 tr.row41 { height:15.75pt }
      table.sheet0 tr.row42 { height:15.75pt }
      table.sheet0 tr.row43 { height:15.75pt }
      table.sheet0 tr.row44 { height:10.5pt }
      table.sheet0 tr.row45 { height:14.25pt }
      table.sheet0 tr.row46 { height:8.25pt }
      table.sheet0 tr.row47 { height:15.75pt }
      table.sheet0 tr.row48 { height:3.75pt }
      table.sheet0 tr.row49 { height:15.75pt }
      table.sheet0 tr.row50 { height:11.25pt }
      table.sheet0 tr.row51 { height:14.25pt }
      table.sheet0 tr.row52 { height:6pt }
      table.sheet0 tr.row53 { height:15.75pt }
      table.sheet0 tr.row54 { height:5.25pt }
      table.sheet0 tr.row55 { height:15.75pt }
      table.sheet0 tr.row56 { height:12pt }
      table.sheet0 tr.row57 { height:12pt }
      table.sheet0 tr.row58 { height:32.25pt }
    </style>
  </head>

  <body>
<style>
@page { margin-left: 0.19685039370079in; margin-right: 0.19685039370079in; margin-top: 0.19685039370079in; margin-bottom: 0.39370078740157in; }
body { margin-left: 0.19685039370079in; margin-right: 0.19685039370079in; margin-top: 0.19685039370079in; margin-bottom: 0.39370078740157in; }
</style>
    <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0">
        <col class="col0">
        <col class="col1">
        <col class="col2">
        <col class="col3">
        <col class="col4">
        <col class="col5">
        <col class="col6">
        <col class="col7">
        <col class="col8">
        <col class="col9">
        <col class="col10">
        <col class="col11">
        <col class="col12">
        <col class="col13">
        <col class="col14">
        <col class="col15">
        <col class="col16">
        <col class="col17">
        <col class="col18">
        <col class="col19">
        <col class="col20">
        <col class="col21">
        <col class="col22">
        <col class="col23">
        <col class="col24">
        <col class="col25">
        <col class="col26">
        <col class="col27">
        <col class="col28">
        <col class="col29">
        <col class="col30">
        <col class="col31">
        <col class="col32">
        <col class="col33">
        <col class="col34">
        <col class="col35">
        <tbody>
          <tr class="row0">
            <td class="column0 style92 s">x</td>
            <td class="column1 style84 s style85" colspan="26" rowspan="3">ORDEN DE PRODUCCIÓN N°   </td>
            <td class="column27 style83 null"></td>
            <td class="column28 style91 n style91" colspan="7" rowspan="3">136</td>
            <td class="column35 style92 s">x</td>
          </tr>
          <tr class="row1">
            <td class="column0 style86 null"></td>
            <td class="column27 style83 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row2">
            <td class="column0 style86 null"></td>
            <td class="column27 style83 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row3">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style1 null"></td>
            <td class="column3 style1 null"></td>
            <td class="column4 style1 null"></td>
            <td class="column5 style1 null"></td>
            <td class="column6 style1 null"></td>
            <td class="column7 style1 null"></td>
            <td class="column8 style1 null"></td>
            <td class="column9 style1 null"></td>
            <td class="column10 style1 null"></td>
            <td class="column11 style1 null"></td>
            <td class="column12 style1 null"></td>
            <td class="column13 style1 null"></td>
            <td class="column14 style1 null"></td>
            <td class="column15 style1 null"></td>
            <td class="column16 style1 null"></td>
            <td class="column17 style1 null"></td>
            <td class="column18 style1 null"></td>
            <td class="column19 style2 null"></td>
            <td class="column20 style1 null"></td>
            <td class="column21 style1 null"></td>
            <td class="column22 style1 null"></td>
            <td class="column23 style1 null"></td>
            <td class="column24 style1 null"></td>
            <td class="column25 style1 null"></td>
            <td class="column26 style1 null"></td>
            <td class="column27 style1 null"></td>
            <td class="column28 style1 null"></td>
            <td class="column29 style1 null"></td>
            <td class="column30 style1 null"></td>
            <td class="column31 style1 null"></td>
            <td class="column32 style1 null"></td>
            <td class="column33 style1 null"></td>
            <td class="column34 style1 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row4">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style56 s style56" colspan="5">Ordenante:</td>
            <td class="column7 style65 s style65" colspan="11">&nbsp;@usuario</td>
            <td class="column18 style3 null"></td>
            <td class="column19 style4 null"></td>
            <td class="column20 style3 null"></td>
            <td class="column21 style3 null"></td>
            <td class="column22 style66 s style66" colspan="6">Fecha de carga:</td>
            <td class="column28 style65 s style65" colspan="6">&nbsp;02/04/2020</td>
            <td class="column34 style40 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row5">
            <td class="column0 style86 null"></td>
            <td class="column1 style5 null"></td>
            <td class="column2 style6 null"></td>
            <td class="column3 style5 null"></td>
            <td class="column4 style6 null"></td>
            <td class="column5 style6 null"></td>
            <td class="column6 style6 null"></td>
            <td class="column7 style6 null"></td>
            <td class="column8 style6 null"></td>
            <td class="column9 style6 null"></td>
            <td class="column10 style6 null"></td>
            <td class="column11 style6 null"></td>
            <td class="column12 style6 null"></td>
            <td class="column13 style6 null"></td>
            <td class="column14 style6 null"></td>
            <td class="column15 style6 null"></td>
            <td class="column16 style6 null"></td>
            <td class="column17 style6 null"></td>
            <td class="column18 style6 null"></td>
            <td class="column19 style7 null"></td>
            <td class="column20 style6 null"></td>
            <td class="column21 style6 null"></td>
            <td class="column22 style5 null"></td>
            <td class="column23 style5 null"></td>
            <td class="column24 style5 null"></td>
            <td class="column25 style5 null"></td>
            <td class="column26 style5 null"></td>
            <td class="column27 style5 null"></td>
            <td class="column28 style5 null"></td>
            <td class="column29 style5 null"></td>
            <td class="column30 style5 null"></td>
            <td class="column31 style5 null"></td>
            <td class="column32 style5 null"></td>
            <td class="column33 style5 null"></td>
            <td class="column34 style5 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row6">
            <td class="column0 style86 null"></td>
            <td class="column1 style8 null"></td>
            <td class="column2 style8 null"></td>
            <td class="column3 style8 null"></td>
            <td class="column4 style8 null"></td>
            <td class="column5 style8 null"></td>
            <td class="column6 style8 null"></td>
            <td class="column7 style8 null"></td>
            <td class="column8 style8 null"></td>
            <td class="column9 style8 null"></td>
            <td class="column10 style8 null"></td>
            <td class="column11 style8 null"></td>
            <td class="column12 style8 null"></td>
            <td class="column13 style8 null"></td>
            <td class="column14 style8 null"></td>
            <td class="column15 style8 null"></td>
            <td class="column16 style8 null"></td>
            <td class="column17 style8 null"></td>
            <td class="column18 style8 null"></td>
            <td class="column19 style8 null"></td>
            <td class="column20 style8 null"></td>
            <td class="column21 style8 null"></td>
            <td class="column22 style8 null"></td>
            <td class="column23 style8 null"></td>
            <td class="column24 style8 null"></td>
            <td class="column25 style8 null"></td>
            <td class="column26 style8 null"></td>
            <td class="column27 style8 null"></td>
            <td class="column28 style8 null"></td>
            <td class="column29 style8 null"></td>
            <td class="column30 style8 null"></td>
            <td class="column31 style8 null"></td>
            <td class="column32 style8 null"></td>
            <td class="column33 style8 null"></td>
            <td class="column34 style87 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row7">
            <td class="column0 style86 null"></td>
            <td class="column1 style9 null"></td>
            <td class="column2 style10 s">1)</td>
            <td class="column3 style41 s style41" colspan="13">PREPARACIÓN DEL PASTON</td>
            <td class="column16 style75 null style75" colspan="19"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row8">
            <td class="column0 style86 null"></td>
            <td class="column1 style11 null"></td>
            <td class="column2 style11 null"></td>
            <td class="column3 style11 null"></td>
            <td class="column4 style11 null"></td>
            <td class="column5 style11 null"></td>
            <td class="column6 style11 null"></td>
            <td class="column7 style11 null"></td>
            <td class="column8 style11 null"></td>
            <td class="column9 style11 null"></td>
            <td class="column10 style11 null"></td>
            <td class="column11 style11 null"></td>
            <td class="column12 style11 null"></td>
            <td class="column13 style11 null"></td>
            <td class="column14 style11 null"></td>
            <td class="column15 style11 null"></td>
            <td class="column16 style11 null"></td>
            <td class="column17 style11 null"></td>
            <td class="column18 style11 null"></td>
            <td class="column19 style11 null"></td>
            <td class="column20 style11 null"></td>
            <td class="column21 style11 null"></td>
            <td class="column22 style11 null"></td>
            <td class="column23 style11 null"></td>
            <td class="column24 style11 null"></td>
            <td class="column25 style11 null"></td>
            <td class="column26 style11 null"></td>
            <td class="column27 style11 null"></td>
            <td class="column28 style11 null"></td>
            <td class="column29 style11 null"></td>
            <td class="column30 style11 null"></td>
            <td class="column31 style11 null"></td>
            <td class="column32 style11 null"></td>
            <td class="column33 style11 null"></td>
            <td class="column34 style11 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row9">
            <td class="column0 style86 null"></td>
            <td class="column1 style12 null"></td>
            <td class="column2 style9 null"></td>
            <td class="column3 style9 null"></td>
            <td class="column4 style68 s style68" colspan="3">Receta:</td>
            <td class="column7 style54 s style54" colspan="12">&nbsp;SALAME ESPAÑOL</td>
            <td class="column19 style12 null"></td>
            <td class="column20 style67 s style67" colspan="5">Peso pastón:</td>
            <td class="column25 style54 n style54" colspan="4">100</td>
            <td class="column29 style54 s style54" colspan="2">Kg.</td>
            <td class="column31 style9 null"></td>
            <td class="column32 style1 null"></td>
            <td class="column33 style1 null"></td>
            <td class="column34 style1 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row10">
            <td class="column0 style86 null"></td>
            <td class="column1 style13 null"></td>
            <td class="column2 style9 null"></td>
            <td class="column3 style9 null"></td>
            <td class="column4 style9 null"></td>
            <td class="column5 style9 null"></td>
            <td class="column6 style9 null"></td>
            <td class="column7 style9 null"></td>
            <td class="column8 style9 null"></td>
            <td class="column9 style9 null"></td>
            <td class="column10 style14 null"></td>
            <td class="column11 style12 null"></td>
            <td class="column12 style12 null"></td>
            <td class="column13 style12 null"></td>
            <td class="column14 style12 null"></td>
            <td class="column15 style12 null"></td>
            <td class="column16 style12 null"></td>
            <td class="column17 style12 null"></td>
            <td class="column18 style12 null"></td>
            <td class="column19 style12 null"></td>
            <td class="column20 style12 null"></td>
            <td class="column21 style12 null"></td>
            <td class="column22 style1 null"></td>
            <td class="column23 style1 null"></td>
            <td class="column24 style1 null"></td>
            <td class="column25 style9 null"></td>
            <td class="column26 style9 null"></td>
            <td class="column27 style9 null"></td>
            <td class="column28 style9 null"></td>
            <td class="column29 style9 null"></td>
            <td class="column30 style9 null"></td>
            <td class="column31 style1 null"></td>
            <td class="column32 style1 null"></td>
            <td class="column33 style1 null"></td>
            <td class="column34 style1 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row11">
            <td class="column0 style86 null"></td>
            <td class="column1 style15 null"></td>
            <td class="column2 style9 null"></td>
            <td class="column3 style9 null"></td>
            <td class="column4 style79 s style79" colspan="8">Peso de unidad Fresca</td>
            <td class="column12 style80 n style80" colspan="3">0.900</td>
            <td class="column15 style16 s">Kg</td>
            <td class="column16 style12 null"></td>
            <td class="column17 style9 null"></td>
            <td class="column18 style9 null"></td>
            <td class="column19 style9 null"></td>
            <td class="column20 style81 s style81" colspan="8" rowspan="2">Cantidad de unidades frescas:</td>
            <td class="column28 style9 null"></td>
            <td class="column29 style9 null"></td>
            <td class="column30 style9 null"></td>
            <td class="column31 style9 null"></td>
            <td class="column32 style9 null"></td>
            <td class="column33 style9 null"></td>
            <td class="column34 style9 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row12">
            <td class="column0 style86 null"></td>
            <td class="column1 style15 null"></td>
            <td class="column2 style9 null"></td>
            <td class="column3 style9 null"></td>
            <td class="column4 style79 s style79" colspan="8">Largo de Unidad fresca</td>
            <td class="column12 style82 n style82" colspan="3">0.650</td>
            <td class="column15 style17 s">M</td>
            <td class="column16 style12 null"></td>
            <td class="column17 style9 null"></td>
            <td class="column18 style9 null"></td>
            <td class="column19 style9 null"></td>
            <td class="column28 style72 n style72" colspan="3">1121</td>
            <td class="column31 style72 s style72" colspan="3">unidades.</td>
            <td class="column34 style88 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row13">
            <td class="column0 style86 null"></td>
            <td class="column1 style15 null"></td>
            <td class="column2 style15 null"></td>
            <td class="column3 style15 null"></td>
            <td class="column4 style15 null"></td>
            <td class="column5 style15 null"></td>
            <td class="column6 style15 null"></td>
            <td class="column7 style15 null"></td>
            <td class="column8 style15 null"></td>
            <td class="column9 style15 null"></td>
            <td class="column10 style15 null"></td>
            <td class="column11 style15 null"></td>
            <td class="column12 style15 null"></td>
            <td class="column13 style15 null"></td>
            <td class="column14 style15 null"></td>
            <td class="column15 style15 null"></td>
            <td class="column16 style15 null"></td>
            <td class="column17 style15 null"></td>
            <td class="column18 style15 null"></td>
            <td class="column19 style15 null"></td>
            <td class="column20 style15 null"></td>
            <td class="column21 style15 null"></td>
            <td class="column22 style15 null"></td>
            <td class="column23 style15 null"></td>
            <td class="column24 style15 null"></td>
            <td class="column25 style15 null"></td>
            <td class="column26 style15 null"></td>
            <td class="column27 style15 null"></td>
            <td class="column28 style15 null"></td>
            <td class="column29 style15 null"></td>
            <td class="column30 style15 null"></td>
            <td class="column31 style15 null"></td>
            <td class="column32 style15 null"></td>
            <td class="column33 style15 null"></td>
            <td class="column34 style15 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row14">
            <td class="column0 style86 null"></td>
            <td class="column1 style12 null"></td>
            <td class="column2 style9 null"></td>
            <td class="column3 style58 s style58" colspan="15">Lista de carnes</td>
            <td class="column18 style12 null"></td>
            <td class="column19 style9 null"></td>
            <td class="column20 style9 null"></td>
            <td class="column21 style73 s style73" colspan="12">Lista de insumos</td>
            <td class="column33 style9 null"></td>
            <td class="column34 style9 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row15">
            <td class="column0 style86 null"></td>
            <td class="column1 style18 null"></td>
            <td class="column2 style18 null"></td>
            <td class="column3 style18 null"></td>
            <td class="column4 style18 null"></td>
            <td class="column5 style18 null"></td>
            <td class="column6 style18 null"></td>
            <td class="column7 style18 null"></td>
            <td class="column8 style18 null"></td>
            <td class="column9 style18 null"></td>
            <td class="column10 style18 null"></td>
            <td class="column11 style18 null"></td>
            <td class="column12 style18 null"></td>
            <td class="column13 style18 null"></td>
            <td class="column14 style18 null"></td>
            <td class="column15 style18 null"></td>
            <td class="column16 style18 null"></td>
            <td class="column17 style18 null"></td>
            <td class="column18 style18 null"></td>
            <td class="column19 style18 null"></td>
            <td class="column20 style18 null"></td>
            <td class="column21 style18 null"></td>
            <td class="column22 style18 null"></td>
            <td class="column23 style18 null"></td>
            <td class="column24 style18 null"></td>
            <td class="column25 style18 null"></td>
            <td class="column26 style18 null"></td>
            <td class="column27 style18 null"></td>
            <td class="column28 style18 null"></td>
            <td class="column29 style18 null"></td>
            <td class="column30 style18 null"></td>
            <td class="column31 style18 null"></td>
            <td class="column32 style18 null"></td>
            <td class="column33 style18 null"></td>
            <td class="column34 style18 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row16">
            <td class="column0 style86 null"></td>
            <td class="column1 style9 null"></td>
            <td class="column2 style69 s style71" colspan="5">N° Desposte</td>
            <td class="column7 style69 s style71" colspan="8">Carne</td>
            <td class="column15 style69 s style71" colspan="4">Cantidad</td>
            <td class="column19 style12 null"></td>
            <td class="column20 style69 s style71" colspan="10">Insumo</td>
            <td class="column30 style69 s style71" colspan="4">Cantidad</td>
            <td class="column34 style90 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row17">
            <td class="column0 style86 null"></td>
            <td class="column1 style3 null"></td>
            <td class="column2 style62 n style64" colspan="5">1</td>
            <td class="column7 style62 s style64" colspan="8">ASADO / COSTILLAR</td>
            <td class="column15 style62 n style63" colspan="3">15.98</td>
            <td class="column18 style19 s">kg</td>
            <td class="column19 style20 null"></td>
            <td class="column20 style62 s style64" colspan="10">AZUCAR</td>
            <td class="column30 style62 n style63" colspan="3">0.3</td>
            <td class="column33 style21 s">kg</td>
            <td class="column34 style28 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row18">
            <td class="column0 style86 null"></td>
            <td class="column1 style3 null"></td>
            <td class="column2 style62 n style64" colspan="5">2</td>
            <td class="column7 style62 s style64" colspan="8">ASADO / COSTILLAR</td>
            <td class="column15 style62 n style63" colspan="3">19.29</td>
            <td class="column18 style19 s">kg</td>
            <td class="column19 style20 null"></td>
            <td class="column20 style62 s style64" colspan="10">NUEZ MOS</td>
            <td class="column30 style62 n style63" colspan="3">0.05</td>
            <td class="column33 style21 s">kg</td>
            <td class="column34 style28 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row19">
            <td class="column0 style86 null"></td>
            <td class="column1 style3 null"></td>
            <td class="column2 style62 n style64" colspan="5">3</td>
            <td class="column7 style62 s style64" colspan="8">ASADO / COSTILLAR</td>
            <td class="column15 style62 n style63" colspan="3">3.8</td>
            <td class="column18 style19 s">kg</td>
            <td class="column19 style20 null"></td>
            <td class="column20 style62 s style64" colspan="10">PIMENTON</td>
            <td class="column30 style62 n style63" colspan="3">0.8</td>
            <td class="column33 style21 s">kg</td>
            <td class="column34 style28 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row20">
            <td class="column0 style86 null"></td>
            <td class="column1 style3 null"></td>
            <td class="column2 style62 n style64" colspan="5">1</td>
            <td class="column7 style62 s style64" colspan="8">PARRILLERO</td>
            <td class="column15 style62 n style63" colspan="3">18</td>
            <td class="column18 style19 s">kg</td>
            <td class="column19 style20 null"></td>
            <td class="column20 style62 s style64" colspan="10">AJO POLVO</td>
            <td class="column30 style62 n style63" colspan="3">0.08</td>
            <td class="column33 style21 s">kg</td>
            <td class="column34 style28 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row21">
            <td class="column0 style86 null"></td>
            <td class="column1 style3 null"></td>
            <td class="column2 style62 n style64" colspan="5">2</td>
            <td class="column7 style62 s style64" colspan="8">IBERICO</td>
            <td class="column15 style62 n style63" colspan="3">5.21</td>
            <td class="column18 style19 s">kg</td>
            <td class="column19 style20 null"></td>
            <td class="column20 style62 s style64" colspan="10">OREGANO</td>
            <td class="column30 style62 n style63" colspan="3">0.1</td>
            <td class="column33 style21 s">M</td>
            <td class="column34 style28 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row22">
            <td class="column0 style86 null"></td>
            <td class="column1 style3 null"></td>
            <td class="column2 style62 n style64" colspan="5">1</td>
            <td class="column7 style62 s style64" colspan="8">BONDIOLA</td>
            <td class="column15 style62 n style63" colspan="3">8.27</td>
            <td class="column18 style19 s">kg</td>
            <td class="column19 style20 null"></td>
            <td class="column20 style62 null style64" colspan="10"></td>
            <td class="column30 style62 null style63" colspan="3"></td>
            <td class="column33 style21 null"></td>
            <td class="column34 style28 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row23">
            <td class="column0 style86 null"></td>
            <td class="column1 style3 null"></td>
            <td class="column2 style62 n style64" colspan="5">1</td>
            <td class="column7 style62 s style64" colspan="8">BOLA DE LOMO</td>
            <td class="column15 style62 n style63" colspan="3">9.45</td>
            <td class="column18 style19 s">kg</td>
            <td class="column19 style20 null"></td>
            <td class="column20 style62 null style64" colspan="10"></td>
            <td class="column30 style62 null style63" colspan="3"></td>
            <td class="column33 style21 null"></td>
            <td class="column34 style28 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row24">
            <td class="column0 style86 null"></td>
            <td class="column1 style3 null"></td>
            <td class="column2 style62 n style64" colspan="5">2</td>
            <td class="column7 style62 s style64" colspan="8">TOCINO</td>
            <td class="column15 style62 n style63" colspan="3">20</td>
            <td class="column18 style19 s">kg</td>
            <td class="column19 style22 null"></td>
            <td class="column20 style62 null style64" colspan="10"></td>
            <td class="column30 style62 null style63" colspan="3"></td>
            <td class="column33 style21 null"></td>
            <td class="column34 style28 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row25">
            <td class="column0 style86 null"></td>
            <td class="column1 style22 null"></td>
            <td class="column2 style62 null style64" colspan="5"></td>
            <td class="column7 style62 null style64" colspan="8"></td>
            <td class="column15 style62 null style63" colspan="3"></td>
            <td class="column18 style19 null"></td>
            <td class="column19 style3 null"></td>
            <td class="column20 style62 null style64" colspan="10"></td>
            <td class="column30 style62 null style63" colspan="3"></td>
            <td class="column33 style21 null"></td>
            <td class="column34 style28 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row26">
            <td class="column0 style86 null"></td>
            <td class="column1 style22 null"></td>
            <td class="column2 style62 null style64" colspan="5"></td>
            <td class="column7 style62 null style64" colspan="8"></td>
            <td class="column15 style62 null style63" colspan="3"></td>
            <td class="column18 style19 null"></td>
            <td class="column19 style3 null"></td>
            <td class="column20 style62 null style64" colspan="10"></td>
            <td class="column30 style62 null style63" colspan="3"></td>
            <td class="column33 style21 null"></td>
            <td class="column34 style28 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row27">
            <td class="column0 style86 null"></td>
            <td class="column1 style3 null"></td>
            <td class="column2 style62 null style64" colspan="5"></td>
            <td class="column7 style62 null style64" colspan="8"></td>
            <td class="column15 style62 null style63" colspan="3"></td>
            <td class="column18 style19 null"></td>
            <td class="column19 style22 null"></td>
            <td class="column20 style62 null style64" colspan="10"></td>
            <td class="column30 style62 null style63" colspan="3"></td>
            <td class="column33 style21 null"></td>
            <td class="column34 style28 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row28">
            <td class="column0 style86 null"></td>
            <td class="column1 style3 null"></td>
            <td class="column2 style23 null"></td>
            <td class="column3 style24 null"></td>
            <td class="column4 style24 null"></td>
            <td class="column5 style24 null"></td>
            <td class="column6 style24 null"></td>
            <td class="column7 style23 null"></td>
            <td class="column8 style24 null"></td>
            <td class="column9 style24 null"></td>
            <td class="column10 style24 null"></td>
            <td class="column11 style24 null"></td>
            <td class="column12 style24 null"></td>
            <td class="column13 style24 null"></td>
            <td class="column14 style25 null"></td>
            <td class="column15 style24 null"></td>
            <td class="column16 style24 null"></td>
            <td class="column17 style24 null"></td>
            <td class="column18 style19 null"></td>
            <td class="column19 style22 null"></td>
            <td class="column20 style23 null"></td>
            <td class="column21 style24 null"></td>
            <td class="column22 style24 null"></td>
            <td class="column23 style24 null"></td>
            <td class="column24 style24 null"></td>
            <td class="column25 style24 null"></td>
            <td class="column26 style24 null"></td>
            <td class="column27 style24 null"></td>
            <td class="column28 style24 null"></td>
            <td class="column29 style25 null"></td>
            <td class="column30 style23 null"></td>
            <td class="column31 style24 null"></td>
            <td class="column32 style24 null"></td>
            <td class="column33 style21 null"></td>
            <td class="column34 style28 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row29">
            <td class="column0 style86 null"></td>
            <td class="column1 style3 null"></td>
            <td class="column2 style23 null"></td>
            <td class="column3 style24 null"></td>
            <td class="column4 style24 null"></td>
            <td class="column5 style24 null"></td>
            <td class="column6 style24 null"></td>
            <td class="column7 style23 null"></td>
            <td class="column8 style24 null"></td>
            <td class="column9 style24 null"></td>
            <td class="column10 style24 null"></td>
            <td class="column11 style24 null"></td>
            <td class="column12 style24 null"></td>
            <td class="column13 style24 null"></td>
            <td class="column14 style25 null"></td>
            <td class="column15 style24 null"></td>
            <td class="column16 style24 null"></td>
            <td class="column17 style24 null"></td>
            <td class="column18 style19 null"></td>
            <td class="column19 style22 null"></td>
            <td class="column20 style23 null"></td>
            <td class="column21 style24 null"></td>
            <td class="column22 style24 null"></td>
            <td class="column23 style24 null"></td>
            <td class="column24 style24 null"></td>
            <td class="column25 style24 null"></td>
            <td class="column26 style24 null"></td>
            <td class="column27 style24 null"></td>
            <td class="column28 style24 null"></td>
            <td class="column29 style25 null"></td>
            <td class="column30 style23 null"></td>
            <td class="column31 style24 null"></td>
            <td class="column32 style24 null"></td>
            <td class="column33 style21 null"></td>
            <td class="column34 style28 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row30">
            <td class="column0 style86 null"></td>
            <td class="column1 style3 null"></td>
            <td class="column2 style26 null"></td>
            <td class="column3 style26 null"></td>
            <td class="column4 style26 null"></td>
            <td class="column5 style26 null"></td>
            <td class="column6 style26 null"></td>
            <td class="column7 style26 null"></td>
            <td class="column8 style26 null"></td>
            <td class="column9 style26 null"></td>
            <td class="column10 style26 null"></td>
            <td class="column11 style26 null"></td>
            <td class="column12 style26 null"></td>
            <td class="column13 style26 null"></td>
            <td class="column14 style26 null"></td>
            <td class="column15 style26 null"></td>
            <td class="column16 style26 null"></td>
            <td class="column17 style26 null"></td>
            <td class="column18 style27 null"></td>
            <td class="column19 style22 null"></td>
            <td class="column20 style26 null"></td>
            <td class="column21 style26 null"></td>
            <td class="column22 style26 null"></td>
            <td class="column23 style26 null"></td>
            <td class="column24 style26 null"></td>
            <td class="column25 style26 null"></td>
            <td class="column26 style26 null"></td>
            <td class="column27 style26 null"></td>
            <td class="column28 style26 null"></td>
            <td class="column29 style26 null"></td>
            <td class="column30 style26 null"></td>
            <td class="column31 style26 null"></td>
            <td class="column32 style26 null"></td>
            <td class="column33 style28 null"></td>
            <td class="column34 style28 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row31">
            <td class="column0 style86 null"></td>
            <td class="column1 style29 null"></td>
            <td class="column2 style29 null"></td>
            <td class="column3 style29 null"></td>
            <td class="column4 style29 null"></td>
            <td class="column5 style29 null"></td>
            <td class="column6 style29 null"></td>
            <td class="column7 style29 null"></td>
            <td class="column8 style29 null"></td>
            <td class="column9 style29 null"></td>
            <td class="column10 style29 null"></td>
            <td class="column11 style29 null"></td>
            <td class="column12 style29 null"></td>
            <td class="column13 style29 null"></td>
            <td class="column14 style29 null"></td>
            <td class="column15 style29 null"></td>
            <td class="column16 style29 null"></td>
            <td class="column17 style29 null"></td>
            <td class="column18 style29 null"></td>
            <td class="column19 style29 null"></td>
            <td class="column20 style29 null"></td>
            <td class="column21 style29 null"></td>
            <td class="column22 style29 null"></td>
            <td class="column23 style29 null"></td>
            <td class="column24 style29 null"></td>
            <td class="column25 style29 null"></td>
            <td class="column26 style29 null"></td>
            <td class="column27 style29 null"></td>
            <td class="column28 style29 null"></td>
            <td class="column29 style29 null"></td>
            <td class="column30 style29 null"></td>
            <td class="column31 style29 null"></td>
            <td class="column32 style29 null"></td>
            <td class="column33 style29 null"></td>
            <td class="column34 style29 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row32">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style10 s">2)</td>
            <td class="column3 style41 s style41" colspan="14">RESULTADO DEL EMBUTIDO</td>
            <td class="column17 style75 null style75" colspan="18"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row33">
            <td class="column0 style86 null"></td>
            <td class="column1 style11 null"></td>
            <td class="column2 style11 null"></td>
            <td class="column3 style11 null"></td>
            <td class="column4 style11 null"></td>
            <td class="column5 style11 null"></td>
            <td class="column6 style11 null"></td>
            <td class="column7 style11 null"></td>
            <td class="column8 style11 null"></td>
            <td class="column9 style11 null"></td>
            <td class="column10 style11 null"></td>
            <td class="column11 style11 null"></td>
            <td class="column12 style11 null"></td>
            <td class="column13 style11 null"></td>
            <td class="column14 style11 null"></td>
            <td class="column15 style11 null"></td>
            <td class="column16 style11 null"></td>
            <td class="column17 style11 null"></td>
            <td class="column18 style11 null"></td>
            <td class="column19 style11 null"></td>
            <td class="column20 style11 null"></td>
            <td class="column21 style11 null"></td>
            <td class="column22 style11 null"></td>
            <td class="column23 style11 null"></td>
            <td class="column24 style11 null"></td>
            <td class="column25 style11 null"></td>
            <td class="column26 style11 null"></td>
            <td class="column27 style11 null"></td>
            <td class="column28 style11 null"></td>
            <td class="column29 style11 null"></td>
            <td class="column30 style11 null"></td>
            <td class="column31 style11 null"></td>
            <td class="column32 style11 null"></td>
            <td class="column33 style11 null"></td>
            <td class="column34 style11 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row34">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style9 null"></td>
            <td class="column3 style58 s style58" colspan="8">Unidades Obtenidas:</td>
            <td class="column11 style43 null style43" colspan="4"></td>
            <td class="column15 style43 s style43" colspan="4">Unidades.</td>
            <td class="column19 style9 null"></td>
            <td class="column20 style1 null"></td>
            <td class="column21 style9 null"></td>
            <td class="column22 style58 s style58" colspan="4">Peso Total:</td>
            <td class="column26 style43 null style43" colspan="6"></td>
            <td class="column32 style30 s">kg</td>
            <td class="column33 style1 null"></td>
            <td class="column34 style1 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row35">
            <td class="column0 style86 null"></td>
            <td class="column1 style11 null"></td>
            <td class="column2 style11 null"></td>
            <td class="column3 style11 null"></td>
            <td class="column4 style11 null"></td>
            <td class="column5 style11 null"></td>
            <td class="column6 style11 null"></td>
            <td class="column7 style11 null"></td>
            <td class="column8 style11 null"></td>
            <td class="column9 style11 null"></td>
            <td class="column10 style11 null"></td>
            <td class="column11 style11 null"></td>
            <td class="column12 style11 null"></td>
            <td class="column13 style11 null"></td>
            <td class="column14 style11 null"></td>
            <td class="column15 style11 null"></td>
            <td class="column16 style11 null"></td>
            <td class="column17 style11 null"></td>
            <td class="column18 style11 null"></td>
            <td class="column19 style11 null"></td>
            <td class="column20 style11 null"></td>
            <td class="column21 style11 null"></td>
            <td class="column22 style11 null"></td>
            <td class="column23 style11 null"></td>
            <td class="column24 style11 null"></td>
            <td class="column25 style11 null"></td>
            <td class="column26 style11 null"></td>
            <td class="column27 style11 null"></td>
            <td class="column28 style11 null"></td>
            <td class="column29 style11 null"></td>
            <td class="column30 style11 null"></td>
            <td class="column31 style11 null"></td>
            <td class="column32 style11 null"></td>
            <td class="column33 style11 null"></td>
            <td class="column34 style11 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row36">
            <td class="column0 style86 null"></td>
            <td class="column1 style9 null"></td>
            <td class="column2 style10 s">3)</td>
            <td class="column3 style41 s style41" colspan="16">MEDICONES DURANTE EL SECADO</td>
            <td class="column19 style75 null style75" colspan="16"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row37">
            <td class="column0 style86 null"></td>
            <td class="column1 style11 null"></td>
            <td class="column2 style11 null"></td>
            <td class="column3 style11 null"></td>
            <td class="column4 style11 null"></td>
            <td class="column5 style11 null"></td>
            <td class="column6 style11 null"></td>
            <td class="column7 style11 null"></td>
            <td class="column8 style11 null"></td>
            <td class="column9 style11 null"></td>
            <td class="column10 style11 null"></td>
            <td class="column11 style11 null"></td>
            <td class="column12 style11 null"></td>
            <td class="column13 style11 null"></td>
            <td class="column14 style11 null"></td>
            <td class="column15 style11 null"></td>
            <td class="column16 style11 null"></td>
            <td class="column17 style11 null"></td>
            <td class="column18 style11 null"></td>
            <td class="column19 style11 null"></td>
            <td class="column20 style11 null"></td>
            <td class="column21 style11 null"></td>
            <td class="column22 style11 null"></td>
            <td class="column23 style11 null"></td>
            <td class="column24 style11 null"></td>
            <td class="column25 style11 null"></td>
            <td class="column26 style11 null"></td>
            <td class="column27 style11 null"></td>
            <td class="column28 style11 null"></td>
            <td class="column29 style11 null"></td>
            <td class="column30 style11 null"></td>
            <td class="column31 style11 null"></td>
            <td class="column32 style11 null"></td>
            <td class="column33 style11 null"></td>
            <td class="column34 style11 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row38">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style31 s">#</td>
            <td class="column3 style59 s style59" colspan="5">Peso</td>
            <td class="column8 style59 s style59" colspan="4">Merma</td>
            <td class="column12 style59 s style59" colspan="7">Responsable</td>
            <td class="column19 style59 s style60" colspan="6">Fecha</td>
            <td class="column25 style61 s style59" colspan="8">Eventos</td>
            <td class="column33 style32 null"></td>
            <td class="column34 style89 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row39">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style33 n">1</td>
            <td class="column3 style46 null style46" colspan="4"></td>
            <td class="column7 style34 s">kg</td>
            <td class="column8 style47 null style46" colspan="3"></td>
            <td class="column11 style34 s">%</td>
            <td class="column12 style47 null style48" colspan="7"></td>
            <td class="column19 style49 s style51" colspan="6">____/____/ 2020</td>
            <td class="column25 style47 null style46" colspan="8"></td>
            <td class="column33 style32 null"></td>
            <td class="column34 style89 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row40">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style33 n">2</td>
            <td class="column3 style46 null style46" colspan="4"></td>
            <td class="column7 style34 s">kg</td>
            <td class="column8 style47 null style46" colspan="3"></td>
            <td class="column11 style34 s">%</td>
            <td class="column12 style47 null style48" colspan="7"></td>
            <td class="column19 style49 s style51" colspan="6">____/____/ 2020</td>
            <td class="column25 style47 null style46" colspan="8"></td>
            <td class="column33 style32 null"></td>
            <td class="column34 style89 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row41">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style33 n">3</td>
            <td class="column3 style46 null style46" colspan="4"></td>
            <td class="column7 style34 s">kg</td>
            <td class="column8 style47 null style46" colspan="3"></td>
            <td class="column11 style34 s">%</td>
            <td class="column12 style47 null style48" colspan="7"></td>
            <td class="column19 style49 s style51" colspan="6">____/____/ 2020</td>
            <td class="column25 style47 null style46" colspan="8"></td>
            <td class="column33 style32 null"></td>
            <td class="column34 style89 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row42">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style35 n">4</td>
            <td class="column3 style76 null style76" colspan="4"></td>
            <td class="column7 style36 s">kg</td>
            <td class="column8 style77 null style76" colspan="3"></td>
            <td class="column11 style36 s">%</td>
            <td class="column12 style77 null style78" colspan="7"></td>
            <td class="column19 style49 s style51" colspan="6">____/____/ 2020</td>
            <td class="column25 style47 null style46" colspan="8"></td>
            <td class="column33 style32 null"></td>
            <td class="column34 style89 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row43">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style33 n">5</td>
            <td class="column3 style46 null style46" colspan="4"></td>
            <td class="column7 style34 s">kg</td>
            <td class="column8 style47 null style46" colspan="3"></td>
            <td class="column11 style34 s">%</td>
            <td class="column12 style47 null style48" colspan="7"></td>
            <td class="column19 style49 s style51" colspan="6">____/____/ 2020</td>
            <td class="column25 style47 null style46" colspan="8"></td>
            <td class="column33 style32 null"></td>
            <td class="column34 style89 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row44">
            <td class="column0 style86 null"></td>
            <td class="column1 style11 null"></td>
            <td class="column2 style11 null"></td>
            <td class="column3 style11 null"></td>
            <td class="column4 style11 null"></td>
            <td class="column5 style11 null"></td>
            <td class="column6 style11 null"></td>
            <td class="column7 style11 null"></td>
            <td class="column8 style11 null"></td>
            <td class="column9 style11 null"></td>
            <td class="column10 style11 null"></td>
            <td class="column11 style11 null"></td>
            <td class="column12 style11 null"></td>
            <td class="column13 style11 null"></td>
            <td class="column14 style11 null"></td>
            <td class="column15 style11 null"></td>
            <td class="column16 style11 null"></td>
            <td class="column17 style11 null"></td>
            <td class="column18 style11 null"></td>
            <td class="column19 style11 null"></td>
            <td class="column20 style11 null"></td>
            <td class="column21 style11 null"></td>
            <td class="column22 style11 null"></td>
            <td class="column23 style11 null"></td>
            <td class="column24 style11 null"></td>
            <td class="column25 style11 null"></td>
            <td class="column26 style11 null"></td>
            <td class="column27 style11 null"></td>
            <td class="column28 style11 null"></td>
            <td class="column29 style11 null"></td>
            <td class="column30 style11 null"></td>
            <td class="column31 style11 null"></td>
            <td class="column32 style11 null"></td>
            <td class="column33 style11 null"></td>
            <td class="column34 style11 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row45">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style10 s">4)</td>
            <td class="column3 style41 s style41" colspan="7">ENVASADO</td>
            <td class="column10 style75 null style75" colspan="25"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row46">
            <td class="column0 style86 null"></td>
            <td class="column1 style11 null"></td>
            <td class="column2 style11 null"></td>
            <td class="column3 style11 null"></td>
            <td class="column4 style11 null"></td>
            <td class="column5 style11 null"></td>
            <td class="column6 style11 null"></td>
            <td class="column7 style11 null"></td>
            <td class="column8 style11 null"></td>
            <td class="column9 style11 null"></td>
            <td class="column10 style11 null"></td>
            <td class="column11 style11 null"></td>
            <td class="column12 style11 null"></td>
            <td class="column13 style11 null"></td>
            <td class="column14 style11 null"></td>
            <td class="column15 style11 null"></td>
            <td class="column16 style11 null"></td>
            <td class="column17 style11 null"></td>
            <td class="column18 style11 null"></td>
            <td class="column19 style11 null"></td>
            <td class="column20 style11 null"></td>
            <td class="column21 style11 null"></td>
            <td class="column22 style11 null"></td>
            <td class="column23 style11 null"></td>
            <td class="column24 style11 null"></td>
            <td class="column25 style11 null"></td>
            <td class="column26 style11 null"></td>
            <td class="column27 style11 null"></td>
            <td class="column28 style11 null"></td>
            <td class="column29 style11 null"></td>
            <td class="column30 style11 null"></td>
            <td class="column31 style11 null"></td>
            <td class="column32 style11 null"></td>
            <td class="column33 style11 null"></td>
            <td class="column34 style11 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row47">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style1 null"></td>
            <td class="column3 style45 s style45" colspan="3">Corte:</td>
            <td class="column6 style43 n style43" colspan="2">2</td>
            <td class="column8 style57 s style57" colspan="4">unidades.</td>
            <td class="column12 style1 null"></td>
            <td class="column13 style9 null"></td>
            <td class="column14 style9 null"></td>
            <td class="column15 style9 null"></td>
            <td class="column16 style9 null"></td>
            <td class="column17 style9 null"></td>
            <td class="column18 style9 null"></td>
            <td class="column19 style9 null"></td>
            <td class="column20 style9 null"></td>
            <td class="column21 style9 null"></td>
            <td class="column22 style45 s style45" colspan="6">Peso esperado:</td>
            <td class="column28 style52 n style52" colspan="3">0.236</td>
            <td class="column31 style43 s style43" colspan="2">Kg/u</td>
            <td class="column33 style9 null"></td>
            <td class="column34 style9 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row48">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style1 null"></td>
            <td class="column3 style1 null"></td>
            <td class="column4 style9 null"></td>
            <td class="column5 style9 null"></td>
            <td class="column6 style9 null"></td>
            <td class="column7 style9 null"></td>
            <td class="column8 style9 null"></td>
            <td class="column9 style1 null"></td>
            <td class="column10 style1 null"></td>
            <td class="column11 style1 null"></td>
            <td class="column12 style1 null"></td>
            <td class="column13 style1 null"></td>
            <td class="column14 style1 null"></td>
            <td class="column15 style1 null"></td>
            <td class="column16 style1 null"></td>
            <td class="column17 style1 null"></td>
            <td class="column18 style1 null"></td>
            <td class="column19 style1 null"></td>
            <td class="column20 style1 null"></td>
            <td class="column21 style1 null"></td>
            <td class="column22 style1 null"></td>
            <td class="column23 style1 null"></td>
            <td class="column24 style1 null"></td>
            <td class="column25 style1 null"></td>
            <td class="column26 style1 null"></td>
            <td class="column27 style1 null"></td>
            <td class="column28 style1 null"></td>
            <td class="column29 style1 null"></td>
            <td class="column30 style1 null"></td>
            <td class="column31 style1 null"></td>
            <td class="column32 style1 null"></td>
            <td class="column33 style1 null"></td>
            <td class="column34 style1 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row49">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style1 null"></td>
            <td class="column3 style45 s style45" colspan="8">Unidades esperadas:</td>
            <td class="column11 style43 n style43" colspan="3">222</td>
            <td class="column14 style43 s style43" colspan="4">Unidades</td>
            <td class="column18 style1 null"></td>
            <td class="column19 style1 null"></td>
            <td class="column20 style1 null"></td>
            <td class="column21 style1 null"></td>
            <td class="column22 style45 s style45" colspan="6">Largo Esperado:</td>
            <td class="column28 style52 n style52" colspan="3">0.300</td>
            <td class="column31 style43 s style43" colspan="2">M/U</td>
            <td class="column33 style9 null"></td>
            <td class="column34 style9 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row50">
            <td class="column0 style86 null"></td>
            <td class="column1 style11 null"></td>
            <td class="column2 style11 null"></td>
            <td class="column3 style11 null"></td>
            <td class="column4 style11 null"></td>
            <td class="column5 style11 null"></td>
            <td class="column6 style11 null"></td>
            <td class="column7 style11 null"></td>
            <td class="column8 style11 null"></td>
            <td class="column9 style11 null"></td>
            <td class="column10 style11 null"></td>
            <td class="column11 style11 null"></td>
            <td class="column12 style11 null"></td>
            <td class="column13 style11 null"></td>
            <td class="column14 style11 null"></td>
            <td class="column15 style11 null"></td>
            <td class="column16 style11 null"></td>
            <td class="column17 style11 null"></td>
            <td class="column18 style11 null"></td>
            <td class="column19 style11 null"></td>
            <td class="column20 style11 null"></td>
            <td class="column21 style11 null"></td>
            <td class="column22 style11 null"></td>
            <td class="column23 style11 null"></td>
            <td class="column24 style11 null"></td>
            <td class="column25 style11 null"></td>
            <td class="column26 style11 null"></td>
            <td class="column27 style11 null"></td>
            <td class="column28 style11 null"></td>
            <td class="column29 style11 null"></td>
            <td class="column30 style11 null"></td>
            <td class="column31 style11 null"></td>
            <td class="column32 style11 null"></td>
            <td class="column33 style11 null"></td>
            <td class="column34 style11 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row51">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style10 s">5)</td>
            <td class="column3 style41 s style41" colspan="13">ENVASADO A DEPOSITO</td>
            <td class="column16 style75 null style75" colspan="19"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row52">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style1 null"></td>
            <td class="column3 style1 null"></td>
            <td class="column4 style9 null"></td>
            <td class="column5 style1 null"></td>
            <td class="column6 style1 null"></td>
            <td class="column7 style1 null"></td>
            <td class="column8 style1 null"></td>
            <td class="column9 style9 null"></td>
            <td class="column10 style1 null"></td>
            <td class="column11 style1 null"></td>
            <td class="column12 style1 null"></td>
            <td class="column13 style1 null"></td>
            <td class="column14 style1 null"></td>
            <td class="column15 style1 null"></td>
            <td class="column16 style1 null"></td>
            <td class="column17 style1 null"></td>
            <td class="column18 style1 null"></td>
            <td class="column19 style9 null"></td>
            <td class="column20 style37 null"></td>
            <td class="column21 style9 null"></td>
            <td class="column22 style9 null"></td>
            <td class="column23 style9 null"></td>
            <td class="column24 style9 null"></td>
            <td class="column25 style9 null"></td>
            <td class="column26 style9 null"></td>
            <td class="column27 style9 null"></td>
            <td class="column28 style9 null"></td>
            <td class="column29 style9 null"></td>
            <td class="column30 style9 null"></td>
            <td class="column31 style9 null"></td>
            <td class="column32 style9 null"></td>
            <td class="column33 style9 null"></td>
            <td class="column34 style9 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row53">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style1 null"></td>
            <td class="column3 style53 s style53" colspan="8">Unidades Obtenidas:</td>
            <td class="column11 style54 null style54" colspan="4"></td>
            <td class="column15 style55 s style55" colspan="4">unidades.</td>
            <td class="column19 style9 null"></td>
            <td class="column20 style37 null"></td>
            <td class="column21 style56 s style56" colspan="8">Fecha de finalización:</td>
            <td class="column29 style54 s style54" colspan="5">___/___/2020</td>
            <td class="column34 style88 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row54">
            <td class="column0 style86 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style1 null"></td>
            <td class="column3 style1 null"></td>
            <td class="column4 style1 null"></td>
            <td class="column5 style1 null"></td>
            <td class="column6 style1 null"></td>
            <td class="column7 style1 null"></td>
            <td class="column8 style1 null"></td>
            <td class="column9 style1 null"></td>
            <td class="column10 style1 null"></td>
            <td class="column11 style1 null"></td>
            <td class="column12 style1 null"></td>
            <td class="column13 style1 null"></td>
            <td class="column14 style1 null"></td>
            <td class="column15 style9 null"></td>
            <td class="column16 style9 null"></td>
            <td class="column17 style9 null"></td>
            <td class="column18 style9 null"></td>
            <td class="column19 style1 null"></td>
            <td class="column20 style2 null"></td>
            <td class="column21 style9 null"></td>
            <td class="column22 style9 null"></td>
            <td class="column23 style9 null"></td>
            <td class="column24 style9 null"></td>
            <td class="column25 style9 null"></td>
            <td class="column26 style9 null"></td>
            <td class="column27 style9 null"></td>
            <td class="column28 style9 null"></td>
            <td class="column29 style9 null"></td>
            <td class="column30 style9 null"></td>
            <td class="column31 style9 null"></td>
            <td class="column32 style1 null"></td>
            <td class="column33 style1 null"></td>
            <td class="column34 style1 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row55">
            <td class="column0 style86 null"></td>
            <td class="column1 style9 null"></td>
            <td class="column2 style9 null"></td>
            <td class="column3 style42 s style42" colspan="4">Peso Total</td>
            <td class="column7 style43 null style43" colspan="6"></td>
            <td class="column13 style30 s">kg</td>
            <td class="column14 style3 null"></td>
            <td class="column15 style9 null"></td>
            <td class="column16 style9 null"></td>
            <td class="column17 style9 null"></td>
            <td class="column18 style9 null"></td>
            <td class="column19 style9 null"></td>
            <td class="column20 style37 null"></td>
            <td class="column21 style9 null"></td>
            <td class="column22 style9 null"></td>
            <td class="column23 style44 s style44" colspan="3">Firma:</td>
            <td class="column26 style38 null"></td>
            <td class="column27 style38 null"></td>
            <td class="column28 style38 null"></td>
            <td class="column29 style38 null"></td>
            <td class="column30 style38 null"></td>
            <td class="column31 style38 null"></td>
            <td class="column32 style38 null"></td>
            <td class="column33 style9 null"></td>
            <td class="column34 style9 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row56">
            <td class="column0 style86 null"></td>
            <td class="column1 style9 null"></td>
            <td class="column2 style9 null"></td>
            <td class="column3 style9 null"></td>
            <td class="column4 style9 null"></td>
            <td class="column5 style9 null"></td>
            <td class="column6 style9 null"></td>
            <td class="column7 style9 null"></td>
            <td class="column8 style9 null"></td>
            <td class="column9 style9 null"></td>
            <td class="column10 style9 null"></td>
            <td class="column11 style9 null"></td>
            <td class="column12 style9 null"></td>
            <td class="column13 style9 null"></td>
            <td class="column14 style9 null"></td>
            <td class="column15 style9 null"></td>
            <td class="column16 style9 null"></td>
            <td class="column17 style9 null"></td>
            <td class="column18 style9 null"></td>
            <td class="column19 style9 null"></td>
            <td class="column20 style37 null"></td>
            <td class="column21 style9 null"></td>
            <td class="column22 style9 null"></td>
            <td class="column23 style9 null"></td>
            <td class="column24 style9 null"></td>
            <td class="column25 style9 null"></td>
            <td class="column26 style9 null"></td>
            <td class="column27 style9 null"></td>
            <td class="column28 style9 null"></td>
            <td class="column29 style9 null"></td>
            <td class="column30 style9 null"></td>
            <td class="column31 style9 null"></td>
            <td class="column32 style9 null"></td>
            <td class="column33 style9 null"></td>
            <td class="column34 style9 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row57">
            <td class="column0 style86 null"></td>
            <td class="column1 style74 null style74" colspan="33" rowspan="2"></td>
            <td class="column34 style39 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
          <tr class="row58">
            <td class="column0 style86 null"></td>
            <td class="column34 style39 null"></td>
            <td class="column35 style86 null"></td>
          </tr>
        </tbody>
    </table>
  </body>
';

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
$spreadsheet = $reader->loadFromString($htmlString);

$writer = new \PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf($spreadsheet);

$writer->save("doc1.pdf");

?>