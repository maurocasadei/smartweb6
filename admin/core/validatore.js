function validategeneral(ssfieldattruniqueform){
  var ret=true;
  var inputs = $("input[text-required][ssfieldattruniqueform=\""+ssfieldattruniqueform+"\"]");
//  console.log(inputs); //output input for debug
  inputs.each(function(){ 
     //console.log(this,$(this).val());//show expression (for debug)  
     if($(this).attr("name"))
     if ($(this).val()==""){
      alert("Il Campo "+$(this).attr("ss-label")+" (" + $(this).attr("name") +")" +" è obbligatorio ma non è stato impostato!");
      $(this).css( "background-color", "red" );
      ret=false;
     }else{
      $(this).css( "background-color", "white" );
     }
  });
  return ret;    
}