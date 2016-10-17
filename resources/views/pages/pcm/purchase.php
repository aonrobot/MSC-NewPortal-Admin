<?php
session_start();
$auth_realm = 'My realm';
//require_once 'lib/authen.php';
$pmenu = "pcm";
include("connectMain/connMain.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="tis-620"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>::MSC Portal::</title>
<link rel="shortcut icon" href="picTemp/favicon.ico">
<link rel="stylesheet" href="css/style.css">
<link href="css/stylemenu.css" rel="stylesheet" type="text/css" />
<link href="font face/fontawesome/font-awesome.css" rel="stylesheet" type="text/css" />
<!--silde scrolltotop-->
  <script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/back-top.js"></script>
<style media="print">
.printingDisplay
{
 display:none;
}
</style>
</head>
<body  id="top" oncontextmenu="return false" class="printingDisplay">
<?php include ("lib/header2.php");
$page = $_GET['page'];
  $shget =  $_GET['sh'];
if($page == ''){
	include("insEmpLogon.php");
	}
	
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
	  $_SESSION['dataSearch'] =  $_POST['dataSearch'];
  }
  if($_SERVER['REQUEST_METHOD'] == 'GET'){
	  $_SESSION['idMeet'] =  $_GET['idMeet'];
	  $_SESSION['idCat'] =  $_GET['idCat'];
	
	  
  }
/*if( $_SESSION['idMeet'] != "" && $_SESSION['idCat'] != ""){
$_SESSION['dataSearch'] = "";
}
 echo "get=".$shget;*/
 if($shget == 1){
	 $_SESSION['idMeet'] = "";
	 $_SESSION['idCat'] = "";
	 $_SESSION['dataSearch'] = $_SESSION['dataSearch'];
	 }else{
		  $_SESSION['idMeet'] = $_SESSION['idMeet'];
	 $_SESSION['idCat'] = $_SESSION['idCat'];
	 $_SESSION['dataSearch'] = "";
		 }
?>

<div id="clearBoth"></div>

<div style="background-image:url(picTemp/icon-purchase/BG-Purchasing13.png); width:1200px; height:217px; ">
 <table border="0" class="W910-purch">
      <tr>
       <td style="color:#0084c0; font-weight:bold; vertical-align:baseline; padding-left:150px;">
       <img src="picTemp/icon-purchase/logoPurchase.png" width="169">
       </td>
        <td style="width:835px; color:#0084c0; font-weight:bold; vertical-align:baseline;">
        <form name="frmSearch" method="post" action="purchase.php?page=supplier&sh=1">
        <div class="float-left" >
        <input name="dataSearch" class="search" type="text" placeholder="ค้นหาสินค้าหรือบริการ"  value="<?php echo $_SESSION['dataSearch'];?>"></div>
        <!--<span class="fa fa-search"></span>  -->
        <button type="submit" class="btn-search"><span class="fa fa-search"></span></button>
       </form>
        <!--<div class="float-left"><span style="margin-left:10px;" class="fa-red fa-exclamation-triangle"></span> <a class="nct" href="purchase.php?page=contact">เงื่อนไขการสั่งซื้อ</a></div>-->
         <div  class="float-left" style=" margin-left:170px;"><a href="mailto:g-faggadmpcm@metrosystems.co.th" title="ส่งเมล์ถึงฝ่ายจัดซื้อ"><span class="fa-blue-16 fa-envelope"></span></a></div>
        </td>
      </tr>
      <tr>
        <td colspan="6">
        </td>
      </tr>
    </table>
   
    </div>
    <?php 
	if($_SESSION['dataSearch'] <> ''){
	$selSearch = "select sl.id_supp,sl.id_meet,sl.id_submeet,sl.id_cat from supplierList sl inner join tb_meet_sgroup msg on sl.id_meet = msg.id_submeet inner join tb_category cg on sl.id_submeet = cg.id_cat left join (select id_supp,image_id,image_name from img_supplierList where image_id = 1) img on sl.id_supp = img.id_supp 
where msg.name_submeet like '%".$_SESSION['dataSearch']."%' or msg.[description] like '%".$_SESSION['dataSearch']."%' or cg.name_cat like '%".$_SESSION['dataSearch']."%' or name_supp like '%".$_SESSION['dataSearch']."%' or tel like '%".$_SESSION['dataSearch']."%' or detail like '%".$_SESSION['dataSearch']."%'";
//echo $selSearch;
			$reSearch = odbc_exec($connid,$selSearch);
			$numSearch = odbc_num_rows($reSearch);
			$G = 0;
			while($rowSearch = odbc_fetch_array($reSearch)){
				$idSuppSrh = array($rowSearch['id_supp']);
				$idMeetSrh = array($rowSearch['id_meet']);
				$idCatSrh = array($rowSearch['id_cat']);
				$idSubmeetSrh = array($rowSearch['id_submeet']);
				if($G==0){
				$idMeetSrh1= "'".$idMeetSrh[0]."'";
				$idSubmeetSrh1= "'".$idSubmeetSrh[0]."'";
				$idCatSrh1= "'".$idCatSrh[0]."'";
				$idSuppSrh1= "'".$idSuppSrh[0]."'";
				}else{
				$idMeetSrh1= ($idMeetSrh1.",'".$idMeetSrh[0]."'");
				$idSubmeetSrh1= ($idSubmeetSrh1.",'".$idSubmeetSrh[0]."'");
				$idCatSrh1= ($idCatSrh1.",'".$idCatSrh[0]."'");
				$idSuppSrh1= ($idSuppSrh1.",'".$idSuppSrh[0]."'");
				}
			$G++;
			}
			$whidMeetSrh = "and msg.id_submeet in (".$idMeetSrh1.")";
			$whidSubmeetSrh = "and sl.id_submeet in (".$idSubmeetSrh1.")";
			$whidCatSrh = "and cg.id_cat in (".$idCatSrh1.")";
			$whidSuppSrh = "and sl.id_supp in (".$idSuppSrh1.")";
	}elseif($_SESSION['idCat'] <> "" and $_SESSION['idMeet'] <> ""){
		$whidMeetSrh = "and msg.id_submeet = '".$_SESSION['idMeet']."'";
		$whidSubmeetSrh = "and sl.id_submeet = '".$_SESSION['idCat']."'";
		$whidCatSrh = "";
		$whidSuppSrh = "";
		}
	else{
		$whidMeetSrh = "";
		$whidSubmeetSrh = "";
		$whidCatSrh = "";
		$whidSuppSrh = "";
		}
?>
<div style="width:1140px;" class=" scroller-inner">
<?php include("supplier-menu.php"); ?>
<div class="BoxCenterW910-purch">
  <ul class="blue">
<!--  <li><a <?php //echo $page == '' || $page == 'sitemap' ? "class='current'" : '';?> href="purchase.php?page=sitemap" title="Supplier Sitemap ">Supplier Sitemap</a></li>-->
    <li><a <?php echo $page == '' || $page == 'supplier' ? "class='current'" : '';?> href="purchase.php?page=supplier" title="Supplier List ">Supplier List</a></li>
     <li><a <?php echo $page == 'about' ? "class='current'" : '';?> href="purchase.php?page=about" title="MSC Application">เกี่ยวกับเรา</a></li>
     <li><a <?php echo $page == 'Manual' ? "class='current'" : '';?> href="purchase.php?page=Manual" title="MSC Application">วิธีการสิ่งซื้อ</a></li>
     <li><a <?php echo $page == 'contact' ? "class='current'" : '';?> href="purchase.php?page=contact" title="MSC Application">ติดต่อเรา</a></li>
  </ul>
  <div id="clearBoth"></div>
  
  <div class="onBoxCenter" align="center" >
    <?php
	if($page == '' || $page == 'supplier'){
		//include("supplier-sitemap.php");
		include("supplier.php");
		}elseif($page == 'about'){
		include("supplier-about.php");
		}elseif($page == 'Manual'){
		include("supplier-manual.php");
		}else{
			include("supplier-contact.php");
			}?>
  </div>
  <!--end onBoxCenter-->
</div>
</div>
  <!--slide girl-->
<?php //include("slideGirl.php");?>
 <!--end slide girl-->
<!--end BoxCenterW910-->
<div style="margin-top:10px; height:0px;">
  <?php include ("lib/footer.php"); ?>
</div>
<p id="back-top"> <a href="#top"><span></span>Back to Top</a> </p>
</body>
</html>

