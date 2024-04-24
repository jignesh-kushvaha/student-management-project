   function onlyalpha(ctrl,msg) 
    {
		 var data = ctrl.value;  //amit patel
		 var result = data.match(/[a-z|A-Z| ]+/); //amit patel
		 if (result != data) 
		 {
			 msg.innerHTML = "Enter Only Alpha";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	}

	 function onlyalphanumeric(ctrl,msg) 
	{
		   var data = ctrl.value;  //amit patel
		   var result = data.match(/[a-z|A-Z|0-9|,/: ]+/); //amit patel
		   if (result != data) 
		   {
			   msg.innerHTML = "Enter Only Alpha,Numeric,Symbol(-,/:)";
		   }
		   else 
		   {
			   msg.innerHTML ="";
		   }
	}



	function onlyalphasymbol(ctrl,msg) 
	{
		   var data = ctrl.value;  //amit patel
		   var result = data.match(/[a-z|A-Z|,.]+/); //amit patel
		   if (result != data) 
		   {
			   msg.innerHTML = "Enter Only Alpha and seperated by comma(,)";
		   }
		   else 
		   {
			   msg.innerHTML ="";
		   }
	}
	 	
   function checklength(ctrl,msg,min,max) 
   {
		 var data = ctrl.value; 
		 var len=data.length;
		 if (len<min || len>max) 
		 {
			 msg.innerHTML = "Password length between " + min+ " to " + max;
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	 }
	 
   function checkemail(ctrl,msg) 
   {
		 var data = ctrl.value; 
		 var prtn=/^\w+([\.]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		 if(!prtn.test(data)) 
		 {
			 msg.innerHTML = "Invalid Email Address..";
		 }
		 else 
		 {
			if(data.length <= 50)
			{
			 msg.innerHTML ="";
			}
			else{
				msg.innerHTML ="Not greater than 50 character.. ";
			}
		 }
	}

	function onlynumber(ctrl,msg) 
	{
		 var data = ctrl.value; 4583
		 var result = data.match(/[0-9]+/);
		 if (result != data) 
		 {
		   msg.innerHTML="Enter only number..";               
		 }
		 else
		 {
			msg.innerHTML="";
		 }
    }

    function chkpositive(ctrl,msg) 
    {
            var data = eval(ctrl.value);
            if (data < 0) 
            {
                msg.innerHTML="Positive Number Only";
            }
            else 
            {
                msg.innerHTML=""; 
            }
    }

   function checkmobileno(ctrl,msg) 
   {
		 var data = ctrl.value; 
		 var prtn=/^\d{10}$/;
		 if(!prtn.test(data)) 
		 {
			 msg.innerHTML = "10 Digits Only..";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	}
	
    function checkalphalength(ctrl,msg) 
    {
		var data = ctrl.value;  //amit patel
		 var result = data.match(/[a-z|A-Z| ]+/); //amit patel
		 if (result != data) 
		 {
			 msg.innerHTML = "Enter Only Alpha";
		 }
		 else 
		 {
			if(data.length <= 10)
			{
				msg.innerHTML ="";
			}
			else
			{
				msg.innerHTML = "Not greater than 10 character";
			}
		 }
	}
	
    function checkrange(ctrl,msg,min,max) 
    {
		 var data = eval(ctrl.value); 
		 if (data<min || data>max) 
		 {
			 msg.innerHTML = "Value between " + min+ " to " + max;
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	}
	
   function confirmpassword(ctrl1,ctrl2,msg) 
    {
		 var data1 = ctrl1.value; 
		 var data2 = ctrl2.value; 
		 
		 if (data1!=data2) 
		 {
			 msg.innerHTML = "Password not match";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	}

   function checkblank(ctrl,msg) 
    {
		 var data = ctrl.value; 
		  
		 if (data=="") 
		 {
			 msg.innerHTML = "Can not left blank";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	} 

function fileValidation(ctrl,msg) 
{
	
	var data = ctrl.value;
	var allowedExtensions =
	/(\.doc|\.docx|\.pdf|\.txt|\.jpeg|\.jpg)$/i;
	if(!allowedExtensions.test(data)) 
	{
		msg.innerHTML = "Only pdf,doc,docx,txt,jpeg,jpg";
	}
	else 
	{
		msg.innerHTML ="";
	}
}

function imgValidation(ctrl,msg) 
{
	
	var data = ctrl.value;
	var allowedExtensions =
	/(\.jpeg|\.jpg|\.png)$/i;
	if(!allowedExtensions.test(data)) 
	{
		msg.innerHTML = "Only jpeg,jpg,png";
	}
	else 
	{
		msg.innerHTML ="";
	}
}
function checkdate(ctrl,msg) 
{
	const date = new Date();
	var data = ctrl.value;
	var dd=date.getDate();
	var mm=date.getMonth() + 1;
	var yy=date.getFullYear();
	var cdate =yy+"-"+mm+"-"+dd;

	var current = new Date(cdate);
	var sdate = new Date(data);
	if(sdate < current) 
	{
		msg.innerHTML = "Previous Date Is Not Allowed";
	}
	else 
	{
		msg.innerHTML ="";
	}
}

