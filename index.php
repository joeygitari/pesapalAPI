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
<br />
<div class="row-fluid">
    <div class="span5">
        <form id="rightcol" action="iframe.php" method="post" class="rounded5">
            <table>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="first_name" value="" /></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="last_name" value="" /></td>
                </tr>
                <tr>
                    <td>Email Address:</td>
                    <td><input type="text" name="email" value="" /></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="text" name="phone_number" value="" /></td>
                </tr>
                <tr>
                    <td>Account Number:</td>
                    <td><input type="text" name="account_number" value="" /></td>
                </tr>
                <tr>
                    <td>Amount:</td>
                    <td>
                        <select name="currency" id="currency">
                            <option value="KES">Kenya shillings</option>  
                            <option value="UGX">Ugandan Shillings</option> 
                            <option value="TZS">Tanzanian shillings</option>  
                            <option value="USD">US Dollars</option>  
                        </select>
                        <input type="text" name="amount" value="" />
                    </td>
                </tr>
                <tr id="refholder" style="visibility: hidden">
                    <td>Reference:</td>
                    <td><input type="text" name="reference" value="" /></td>
                </tr>
                <td colspan="2"><input type="checkbox" name="keys" id="keys"/><b>ENSURE TO CHECK THIS FIELD</b> 
                <br>The sample consumer key and consumer secret used <a href="https://developer.pesapal.com/api3-demo-keys.txt"><b>Sample merchant keys</b></a>.</td>
                </tr>
                <tr><td colspan="2"><hr /></td></tr>
                <tr>
                    <td>Description:</td>
                    <td><input type="text" name="description" value="Payments to ..." /></td>
                </tr>
                <tr><td colspan="2"><hr /></td></tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Make Payment" class="btn" /></td>
                </tr>
            </table>
        </form>
    </div>
</div>

</div>
</div>
</div>
	</section>
	<footer>	
    <p style="display: none;" id="back-top">
        <a href="#top"><span></span></a>
    </p>
    </div>
    
    </div>
    </div>      
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
  	<script src="js/pp.js"></script><style id="jPanelMenu-style-master">body{width:100%}.jPanelMenu,body{overflow-x:hidden}#jPanelMenu-menu{display:block;position:fixed;top:0;left:0;height:100%;z-index:-1;overflow-x:hidden;overflow-y:hidden;-webkit-overflow-scrolling:touch}.jPanelMenu-panel{position:static;left:0;top:0;z-index:2;width:100%;min-height:100%;background:rgb(255, 255, 255)}</style>

</body>
</html>