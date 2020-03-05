<html>
	<head>
		<title>dcr</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="dcr2.css" />
		<link rel="stylesheet" href="jquery.mobile.icons.min.css" />
		<link rel="stylesheet" href="jquery.mobile.structure-1.4.5.min.css" /> 
		<script src="jquery-1.11.1.min.js"></script> 
		<script src="jquery.mobile-1.4.5.min.js"></script> 
	
		<script language="javascript">
			$(function()
			{
				$( "#btnDecripta" ).click(function() {
					if($("#fromText").val()!="")
					{
						decripta($("#fromText").val());
					}
				});
				$( "#btnCripta" ).click(function() {
					if($("#fromText").val()!="")
					{
						cripta($("#fromText").val());
					}
				});
			});
		
			var alphabet="#$%&'()*+,-./0123456789:;=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\\]^_`abcdefghijklmnopqrstuvwxyz{|}~";

			function encrypt(msg, key) 
			{
				var result = "";  
				var index =-1;
				for (var i = 0; i < msg.length; i++)
				{
					var char = msg.charAt(i);  
					if (alphabet.indexOf(char) >= 0)
					{
						index = char.charCodeAt(0) + key;
						if (index > '~'.charCodeAt(0))
						{
							index = index - 92;  
						}
						result += String.fromCharCode(index);  
					}
					else
					{ 
						char=transLate(char);
						result += char;  
					}
				}
				return result;
			}
			function decrypt(msg, key)
			{
				var result = "";
				var index=-1;
				for (var i = 0; i < msg.length; i++)
				{
					var char = msg.charAt(i);  
					if (alphabet.indexOf(char) >= 0)
					{
						index = char.charCodeAt(0) - key;  
						if (index < '#'.charCodeAt(0))
						{
							index = index + 92;  
						}
						result += String.fromCharCode(index);  
					}
					else
					{
						char=originale(char);
						result += char;  
					}
				}
				return result;
			}
			function transLate(char)
			{
				if(char=="!")
				{
					return "\"";
				}
				else
				{
					if(char=="\"")
					{
						return "£";
					}
					else
					{
						if(char=="£")
						{
							return "§";
						}
						else
						{
							if(char=="§")
							{
								return "!";
							}
							else
							{
								return char;
							}
						}
					}
				}
			}
			function originale(char)
			{
				if(char=="\"")
				{
					return "!";
				}
				else
				{
					if(char=="£")
					{
						return "\"";
					}
					else
					{
						if(char=="§")
						{
							return "£";
						}
						else
						{
							if(char=="!")
							{
								return "§";
							}
							else
							{
								return char;
							}
						}
					}
				}
			}
			// 
			
			//function criptaDecripta(wb,sheet,dataMsg,ix,cmd){
			function cripta(fromT)
			{
				var chiave="";
				var stringa="";
				var res="";
				chiave=generaChiave();
				stringa=fromT;
				res=encrypt(stringa,chiave);
				$("#toText").val(res);
			}
			function decripta(fromT)
			{
				var chiave="";
				var stringa="";
				var res="";
				chiave=generaChiave();
				stringa=fromT;
				res=decrypt(stringa,chiave);
				$("#toText").val(res);
			}
			function generaChiave()
			{
				var cell="";
				cell=$("#t").val();
				var keyNum=0;
				var ix=0;
				var c="";
				for(var i=0;i<cell.length;i++)
				{
					ix=0;
					c=cell.charAt(i);
					ix=c.charCodeAt(0);
					//alert(ix);
					keyNum+=ix;
				}
				var res=0;
				res=keyNum % 92;
				// alert(res);
				res=parseInt(res);
				// alert(res);
				return res;
				//alert(keyNum);
			}
		</script>
	</head>
	<body>
		<div class="preview ui-shadow swatch">
			<div class="ui-header ui-bar-a" data-swatch="a" data-theme="a" data-form="ui-bar-a" data-role="header" role="banner">
				<a class="ui-btn-left ui-btn-corner-all ui-btn ui-icon-home ui-btn-icon-notext ui-shadow" title=" Home " data-form="ui-icon" data-role="button" role="button"> Home </a>
				<h1 class="ui-title" tabindex="0" role="heading" aria-level="1">TKOL Decripter</h1>
				<a class="ui-btn-right ui-btn-corner-all ui-btn ui-icon-grid ui-btn-icon-notext ui-shadow" title=" Navigation " data-form="ui-icon" data-role="button" role="button"> Navigation </a>
			</div>
			<div class="ui-content ui-page-theme-a" data-form="ui-page-theme-a" data-theme="a" role="main">
				<input type="text" data-theme="a" Placeholder="In" class="input" data-form="ui-body-a" id="fromText">
				<button data-icon="star" data-theme="a" data-form="ui-btn-up-a" class=" ui-btn ui-btn-a ui-icon-star ui-btn-icon-left ui-shadow ui-corner-all" id="btnDecripta">Decripta</button>
				<button data-icon="star" data-theme="a" data-form="ui-btn-up-a" class=" ui-btn ui-btn-a ui-icon-star ui-btn-icon-left ui-shadow ui-corner-all" id="btnCripta">Cripta</button>
				<input type="text" data-theme="a" Placeholder="Out" class="input" data-form="ui-body-a" id="toText">
				<br>
				<input type="text" data-theme="a" Placeholder="Your key" class="input" data-form="ui-body-a" id="t">
			</div>
		</div>
	</body>
</html>
