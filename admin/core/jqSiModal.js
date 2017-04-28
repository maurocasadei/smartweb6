//tinyMCE.get('#id')    
  $( ".mceEditor" ).each(function( index ) {
    //alert($( this ).attr("name"));
    if ( $( this ).is( ".ssAlreadyInstantiate" ) ) {
    
    }else{
    //  alert($( this ).attr("name"));
      tinymce.init({
            mode : "exact",
            elements: $( this ).attr("name"),
            init_instance_callback : function(editor) {             
                var currentEditor = editor.editorContainer;
              //  alert(currentEditor.editorId);
                $(currentEditor).show();
            }
        });
      $( this ).addClass( "ssAlreadyInstantiate" );
    }
  });   

/*
  if (tinyMCE.get('#'+$( this ).attr("id"))){
    alert( index + ": " + $( this ).attr("id") );   
  }else{
    if ( $( this ).is( ".ssAlreadyInstantiate" ) ) {
      //tinymce.remove($( this ).attr("id"));
    }else{
      //tinymce.execCommand('mceRemoveControl',true, $( this ).attr("id"));
      tinymce.execCommand('mceAddEditor',true,$( this ).attr("id"));
       alert ("no");   
    }
     
  }
});   
/*    
tinymce.init({
		mode : "specific_textareas",
		editor_selector : "mceEditor",  
    init_instance_callback : "myCustomInitInstance"
});  
    
function myCustomInitInstance(inst) {
    $(inst.editorId).addClass( "ssAlreadyInstantiate" );
    alert("Editor 2: " + inst.editorId + " is now initialized.");
    //tinymce.remove(inst.editorId);    
   // 
}        
*/

/*    
    if (tinymce.editors.length>0) {
        tinymce.execCommand('mceFocus', true, txt_area_id);
        tinymce.execCommand('mceRemoveEditor',true, txt_area_id);
        tinymce.execCommand('mceAddEditor',true, txt_area_id);
    }  
    
        */