//AJAX call method with arguments
function loadXMLDoc(startdate, enddate)
{
    var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","gapi/generate-report.php?startdate="+startdate+"&enddate="+enddate,true);
    xmlhttp.send();
}

//AJAX call without arguments
function loadXMLDoc2()
{
    show_progressbar('myDiv');
    var xmlhttp;
    var email = document.getugc.email.value;
    var password = document.getugc.password.value;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","gapi/generate-report.php?email="+email+"&password="+password,true);
    xmlhttp.send();
}

function loadXMLDoc3(sort)
{
    show_progressbar('myDiv');
    var xmlhttp;
    var startdate = document.getugc.startdate.value;
    var enddate = document.getugc.enddate.value;
    var domaintocheck = document.getugc.domaintocheck.value;
    var maxresult = document.getugc.maxresult.value;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","gapi/generate-report.php?startdate="+startdate+"&enddate="+enddate+"&sort="+sort+"&domaintocheck="+domaintocheck+"&maxresult="+maxresult,true);
    xmlhttp.send();
}

function loadXMLDoc4()
{
    show_progressbar('myDiv2');
    var xmlhttp;
    var profileid = document.getugc.profileid.value;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("myDiv2").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","ctr-updated-confirmation.php?profileid="+profileid,true);
    xmlhttp.send();
}

function replace_html(id, content) {
    document.getElementById(id).innerHTML = content;
}

function show_progressbar(id) {
    replace_html(id, '<img src="images/ajax-loader.gif" border="0" alt="Loading, please wait..." />');
}

var progress_bar = new Image();
progress_bar.src = 'images/ajax-loader.gif';

/* back up
function loadXMLDoc3()
{
    show_progressbar('myDiv');
    var xmlhttp;
    var startdate = document.getugc.startdate.value;
    var enddate = document.getugc.enddate.value
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","gapi/example.report.php?startdate="+startdate+"&enddate="+enddate,true);
    xmlhttp.send();
}*/