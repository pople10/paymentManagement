/*********************************** Functions **************************************************/

function amounting(amount)
{
	if(amount<0) return "#ff3030";
	else if(amount==0) return "#0400ed";
	else return "#09cc33";
}
function isNumeric(str) {
  if (typeof str != "string") return false // we only process strings!  
  return !isNaN(str) && // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
         !isNaN(parseFloat(str)) // ...and ensure strings of whitespace fail
}
function isPositiveFloat(s) {
  return !isNaN(s) && Number(s) > 0;
}
function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
	if(amount===undefined) return "0.00";
  try {
    decimalCount = Math.abs(decimalCount);
    decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

    const negativeSign = amount < 0 ? "-" : "";

    let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
    let j = (i.length > 3) ? i.length % 3 : 0;

    return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
  } catch (e) {
    console.log(e)
  }
};
/*********************************** Variables **************************************************/
	/*var convert_USD_to_MAD = $.ajax({
	url:"https://free.currconv.com/api/v7/convert?q=USD_MAD&compact=ultra&apiKey=350652c6c1c5dcaa97e3",async:false}).responseText;
	convert_USD_to_MAD = JSON.parse(convert_USD_to_MAD);
	var convert_MAD_to_USD = $.ajax({
	url:"https://free.currconv.com/api/v7/convert?q=MAD_USD&compact=ultra&apiKey=350652c6c1c5dcaa97e3",async:false}).responseText;
	convert_MAD_to_USD = JSON.parse(convert_MAD_to_USD);*/