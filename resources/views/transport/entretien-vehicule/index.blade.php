@extends('base')

@section('main')
<div class="row">
    <div>
        <a id="Button1" href="javascript:popupwnd('vidange-generale','no','no','no','yes','yes','no','','','1200','500')" target="_self" style="position:absolute;left:30px;top:30px;width:129px;height:82px;z-index:0;">Vidange générale</a>
        <a id="Button2" href="javascript:popupwnd('vidange-pont','no','no','no','yes','yes','no','','','1000','600')" target="_self" style="position:absolute;left:190px;top:30px;width:149px;height:82px;z-index:1;">Vidange huile de pont</a>
        <a id="Button3" href="javascript:popupwnd('vidange-courroie','no','no','no','yes','yes','no','','','1000','600')" target="_self" style="position:absolute;left:360px;top:30px;width:129px;height:82px;z-index:2;">Courroie</a>
        <a id="Button4" href="javascript:popupwnd('./vignette.html','no','no','no','yes','yes','no','','','1000','500')" target="_self" style="position:absolute;left:520px;top:30px;width:129px;height:82px;z-index:3;">Vignette</a>
        <a id="Button5" href="javascript:popupwnd('./carte-transport.html','no','no','no','yes','yes','no','','','1000','800')" target="_self" style="position:absolute;left:670px;top:30px;width:129px;height:82px;z-index:4;">Carte de transport</a>
        <a id="Button6" href="javascript:popupwnd('./assurance.html','no','no','no','yes','yes','no','','','1000','800')" target="_self" style="position:absolute;left:30px;top:130px;width:129px;height:82px;z-index:5;">Assurance</a>
        <a id="Button7" href="#" style="position:absolute;left:190px;top:130px;width:129px;height:82px;z-index:6;">Patente</a>
        <a id="Button8" href="javascript:popupwnd('./visite-technique.html','no','no','no','yes','yes','no','','','1000','500')" target="_self" style="position:absolute;left:360px;top:130px;width:129px;height:82px;z-index:7;">Visite technique</a>
        <a id="Button9" href="javascript:popupwnd('./carte-stationnement.html','no','no','no','yes','yes','no','','','1000','500')" target="_self" style="position:absolute;left:520px;top:130px;width:129px;height:82px;z-index:8;">Carte stationnement</a>
    </div>
</div>
