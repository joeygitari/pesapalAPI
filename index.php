<?php 
    include('header.php'); 
?> 

<script>
	function referenceShuffle(val){
		if (document.getElementById('ref').checked){
            document.getElementById("refholder").style.visibility = "visible";
		}else{
			document.getElementById("refholder").style.visibility = "hidden";
		}
	}
</script>
<body>
<br/>
<div class="transform"><h1>Pesapal Transaction Form</h1></div>
    <div class="main">
        <form id="rightcol" action="iframe.php" method="post" class="rounded5">
            <table>
                <tr>
                    <h2 class="name">First Name:</h2>
                    <input class="Input" type="text" name="first_name" value="" />
                </tr>
                <tr>
                    <h2 class="name">Last Name:</h2>
                    <input class="Input" type="text" name="last_name" value="" />
                </tr>
                <tr>
                    <h2 class="name">Email Address:</h2>
                    <input class="Input" type="text" name="email" value="" />
                </tr>
                <tr>
                    <h2 class="name">Phone Number:</h2>
                    <input class="Input" type="text" name="phone_number" value="" />
                </tr>
                <tr>
                    <h2 class="name">Account Number:</h2>
                    <input class="Input" type="text" name="account_number" value="" />
                </tr>
                <tr>
                    <h2 class="name">Amount:</h2>
                    
                        
                    
                    <input class="Input" type="text" name="amount" value="" /> 
                    <select name="currency" id="currency">
                            <option value="KES">Kenya shillings</option>  
                            <option value="UGX">Ugandan Shillings</option> 
                            <option value="TZS">Tanzanian shillings</option>  
                            <option value="USD">US Dollars</option>  
                    </select>
                    
                </tr>
                <tr id="refholder" style="visibility: hidden">
                    <td>Reference:</td>
                    <td><input class="Input" type="text" name="reference" value="" /></td>
                </tr>
                <td colspan="2"><input type="checkbox" name="keys" id="keys"/>
                <b>ENSURE TO CHECK THIS FIELD</b> 
                <br>The sample consumer key and consumer secret used <a href="https://developer.pesapal.com/api3-demo-keys.txt" style="color:black"><b>Sample merchant keys</b></a>.</td>
                </tr>
                <tr><td colspan="2"><hr /></td></tr>
                <tr>
                    <h2 class="name">Description:</h2>
                        <input class="Input" type="text" name="description" value="Payments to ..." />
                </tr>
                <div>
                    <td colspan="2">
                    <input type="submit" value="Make Payment"  class="btn solid"/>
                    <input type="reset" value="Clear" class="btn solid"></td>
                </div>
            </table>
        </form>
    </div>
</div>

</div>
</div>
</div>
	</section>
    </div>
    
    </div>
    </div>      
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
  	<script src="js/pp.js"></script>

</body>
</html>