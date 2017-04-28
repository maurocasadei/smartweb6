var customModal = `<div class="modal fade ssModal" id="ssModal|suffixtable|"   aria-labelledby="ssModalLabel" aria-hidden="true">
  <div id="modal-dialog|suffixtable|" class="modal-dialog" style="background-color:#21282e;" >
    <div id="ssmodal-content|suffixtable|" class="modal-content">
      <div id="ssmodal-title|suffixtable|"  class="modal-title">   
      </div>
      <div id="ssmodal-body|suffixtable|"  class="modal-body">   
      </div>
      <div id="modal-footer|suffixtable|" class="modal-footer">
        <button type="button" id="ssclose|suffixtable|" class="btn btn-default ssmodal-close|suffixtable|" name="chiudi" id="ssmodal-close|suffixtable|" data-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>`;

var deb=false;      
//if (!isloaded){      
      $(function () {
      
        $(document).on("click", "button[tipo=\"login\"]", function(event){     
      		var form = $(this).parents('form:first');
      		var body = $(this).parents('body:first');
      		sect=body.attr("sect");
      		lev=$(this).attr("lev");
      
      		form.attr('action', "index.php?sect="+sect+"&lev="+lev);
      		form.submit();
      	});
      	$("a[sect]").click(function (){
      		sect=$(this).attr("sect");
      		lev=$(this).attr("lev");
      		window.location.href="index.php?sect="+sect+"&lev="+lev;
      	});  
      	$("button[tipo='addmenu'], button[tipo='updmenu']").click(function (){
      		if (deb){alert("addmenu")};
          var body = $(this).parents('body:first');
      		sect=body.attr("sect");
      		lev=$(this).attr("tipo");
      		mn_IDPadre=$(this).attr("mn_IDPadre");
      		mn_livello=$(this).attr("mn_livello");
      		mn_IDMenu=$(this).attr("mn_IDMenu");
      		window.location.href="index.php?sect="+sect+"&lev="+lev+"&mn_IDMenu="+mn_IDMenu+"&mn_IDPadre="+mn_IDPadre+"&mn_livello="+mn_livello;
      	});

      });
      
      
      /*list*/
      $(function () {   
        $(document).on("click", "button[tipo=\"updmodal\"]", function(event){     
      		event.stopPropagation();
      		event.preventDefault() ;
      		sect=$(this).attr("sect");
      		ID=$(this).attr("ID");
      		IDName=$(this).attr("IDName");
      		IDForeignkey=$(this).attr("IDForeignkey");
      		lev=$(this).attr("tipo");    
          suffixtable= $(this).attr("suffixtable");
          if (deb){alert("upd modal "+suffixtable)};
          var customModal2 = customModal.split("|suffixtable|").join(suffixtable);
          $('body').append(customModal2);
          var loadurl="index.php?sect="+sect+"&lev=upd"+"&"+IDName+"="+ID+"&IDForeignkey="+IDForeignkey;
          $('#ssmodal-body'+suffixtable).load(loadurl+"&modal=true&suffixtable="+suffixtable,function(result){

          });
          openmodal(suffixtable);
          //$('#ssModal'+suffixtable).modal(options);
        }); 
        $(document).on("click", "button[tipo=\"upd\"]", function(event){
//      	$("button[tipo='upd']").click(function (){
      		if (deb){alert("upd")};
      		//var body = $(this).parents('body:first');
      		sect=$(this).attr("sect");
      		ID=$(this).attr("ID");
      		IDName=$(this).attr("IDName");
      		lev=$(this).attr("tipo");                                                 
          var loadurl="index.php?sect="+sect+"&lev="+lev+"&"+IDName+"="+ID;
      		window.location.href=loadurl;
      	});
        $(document).on("click", "button[tipo=\"insmodal\"]", function(event){     
      	//$("button[tipo='insmodal']").click(function (){
      		event.stopPropagation();
      		event.preventDefault();
      		sect=$(this).attr("sect");
          suffixtable= $(this).attr("suffixtable");          
      		lev="ins";
      		IDForeignkey=$(this).attr("IDForeignkey");
          var loadurl="index.php?sect="+sect+"&lev="+lev;
          var customModal2 = customModal.split("|suffixtable|").join(suffixtable);
          $('body').append(customModal2);
          var loadurl="index.php?sect="+sect+"&lev=ins&IDForeignkey="+IDForeignkey;
          $('#ssmodal-body'+suffixtable).load(loadurl+"&modal=true&suffixtable="+suffixtable,function(result){
          });
          openmodal(suffixtable);
      	});
        $(document).on("click", "button[tipo=\"ins\"]", function(event){     
      	//$("button[tipo='ins']").click(function (){
      		if (deb){alert("ins")};
      		//var body = $(this).parents('body:first');
      		sect=$(this).attr("sect");
      		lev=$(this).attr("tipo");
          var loadurl="index.php?sect="+sect+"&lev="+lev;
      		window.location.href=loadurl;
      	});
        $(document).on("click", "button[tipo=\"rem\"]", function(event){     
//      	$("button[tipo='rem']").click(function (){
      		if (deb){alert("rem")};
      		if (confirm('Canellare la Riga Selezionata ?')) {
        		sect=$(this).attr("sect");
      			ID=$(this).attr("ID");
      			IDName=$(this).attr("IDName");
            suffixtable= $(this).attr("suffixtable");          
        		IDForeignkey=$(this).attr("IDForeignkey");
      			lev=$(this).attr("tipo");
      			var loadurl="index.php?sect="+sect+"&lev="+lev+"&"+IDName+"="+ID+"&lev2="+"remove&IDForeignkey="+IDForeignkey;
        		if (deb){alert(loadurl)};
              $.ajax({
                  url: loadurl,
                  type: 'POST',
                  async: false,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function(data){
                    $("#buttonrefresh"+suffixtable).trigger("click");
                    $.getScript('core/jqNoModal.js');
                    $("#ssclose"+suffixtable).trigger("click");
                  }
              });
      		}
      	});
        $(document).on("click", "button[tipo=\"ricerca\"]", function(event){     
      	//$("button[tipo='ricerca']").click(function (){
      		if (deb){alert("ricerca")};
      		var body = $(this).parents('body:first');
      		var form = $(this).parents('form:first');
      		sect=body.attr("sect");
      		lev=body.attr("lev");
      		form.attr("action", "index.php?sect="+sect+"&lev="+lev+"&lev2="+"ricerca");
      		form.submit();
      	});
        $(document).on("click", "button[tipo=\"ssmodal-close\"]", function(event){
      		event.stopPropagation();
      		event.preventDefault() ;
          if (deb){alert($this.attr("name"));}
      	});
        $(document).on("click", "button[tipo=\"refresh\"]", function(event){
      		event.stopPropagation();
      		event.preventDefault() ;
      		//var form = $(this).next('form');  // è il form ricerca
      		suffixtable=$(this).attr("suffixtable");                                                 
          var form = $("#formricerca"+suffixtable);
          if (deb){alert(form.attr("name"))};
      		if (deb){alert(suffixtable)};
      		sect=$(this).attr("sect");
      		lev=$(this).attr("tipo");                                                 
      		IDForeignkey=$(this).attr("IDForeignkey");
          var _data = new FormData(form[0]); 
          var loadurl="index.php?sect="+sect+"&lev="+lev+"&lev2=ricerca&modal=true&IDForeignkey="+IDForeignkey;
      		if (deb){alert(loadurl)};
          $.ajax({
              url: loadurl,
              type: 'POST',
              data: _data,
              async: false,
              cache: false,
              contentType: false,
              processData: false,
              success: function(data){
                  $('#content-table'+suffixtable).html( data);
                	$("#content-table"+suffixtable+" > #dataTableSS").DataTable({
                		dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                		buttons: [
                			{extend: 'copy', className: 'btn-sm'},
                			{extend: 'csv', title: 'ExampleFile', className: 'btn-sm'},
                			{extend: 'excel', title: 'ExampleFile', className: 'btn-sm'},
                			{extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                			{extend: 'print', className: 'btn-sm'}
                		]
                	});      
              }
          });
      	});

      });
      
      /*dett non modale*/
      
      $(function () {
        $(document).on("click", "button[tipo=\"salva\"]", function(event){     
      	//$("button[tipo='salva']").click(function (e){
          if (deb){alert("salva non modale")};
          var lenp=$(this).parents('.ssModal').length;
          if (lenp) {return;} //se è il salva modale non proseguire
          if (deb){alert("salva non modale")};
      		var body = $(this).parents('body:first');
      		var form = $(this).parents('form:first');
      		sect=body.attr("sect");
      		lev=body.attr("lev");
      		$( ".content-area" ).each(function( index ) {
      			var contentareatext = $(this).html();
      			var idcontent=$(this).attr("objlink");
      			$("#"+idcontent).text(contentareatext);
      		});
      		form.attr("action", "index.php?sect="+sect+"&lev="+lev+"&lev2="+"salva");
          if (validate()){
              form.submit();
          }else{
            //alert("Errore nel controllo campi");
          }
      	});
      });

          
      /*gen function*/
      $.urlParam = function(name){
          var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
          if (results==null){
             return null;
          }
          else{
             return results[1] || 0;
          }
      } /* 
      $('body').on('hidden.bs.modal', '.modal', function(e) {
          $(".ssmodal-body").empty();
          //if (deb){alert($("#ssmodal-body"));}
      });  */
//}
/*tipo button in dettaglio*/
      /*list*/
$(function () {
  $(document).on("click", "button[tipo=\"vaia\"]", function(event){     
	//$("button[tipo='vaia']").click(function (){
		sect=$(this).attr("sect");
		ID=$(this).attr("ID");
		IDName=$(this).attr("IDName");
    var suffixtable=Math.floor((Math.random() * 100) + 1);                                              
		lev="upd";                                                 
    var customModal2 = customModal.split("|suffixtable|").join(suffixtable);
    $('body').append(customModal2);
    var loadurl="index.php?sect="+sect+"&lev="+lev+"&"+IDName+"="+ID+"&modal=true";
    $('#ssmodal-body'+suffixtable).load(loadurl+"&modal=true&suffixtable="+suffixtable,function(result){
    });
    openmodal(suffixtable);
  }); 
  $(document).on("click", "button[tipo=\"aprilistamodale\"]", function(event){     
    try {
  		sect=$(this).attr("sect");
  		ID=$(this).attr("ID");
  		IDName=$(this).attr("IDName");
    	CampoDaAssegnare=$(this).attr("CampoDaAssegnare");    
  		lev="list";   
      var suffixtable=Math.floor((Math.random() * 100) + 1);                                              
      var customModal2 = customModal.split("|suffixtable|").join(suffixtable);
      var loadurl="index.php?sect="+sect+"&lev="+lev+"&"+IDName+"="+ID+"&modal=true&CampoDaAssegnare="+CampoDaAssegnare;
      $('body').append(customModal2);
      $('#ssmodal-body'+suffixtable).load(loadurl+"&modal=true&suffixtable="+suffixtable,function(result){
      });
      openmodal(suffixtable);
    }
    catch(err) {
      alert(err);
    }     
  }); 
  $(document).on("click", "button[tipo=\"assegna\"]", function(event){  
    try {
  		event.stopPropagation();
  		event.preventDefault() ;
  		sect=$(this).attr("sect");
  		ID=$(this).attr("ID");
  		IDName=$(this).attr("IDName");
  		CampoDaAssegnare=$(this).attr("CampoDaAssegnare");
  		TestoCampoDaAssegnare=$(this).attr("TestoCampoDaAssegnare");
  		suffixtable=$(this).attr("suffixtable");
      //devo scrivere il campo con id IDCampoDaAssegnare
      //alert(TestoCampoDaAssegnare);
      $("#"+CampoDaAssegnare).html(ID);
      //$("#"+CampoDaAssegnare).val('Gateway 2').prop('selected', true);
      $("#"+CampoDaAssegnare).append($('<option>', {
          value: ID,
          text: TestoCampoDaAssegnare
      }));
      $("#ssclose"+suffixtable).trigger("click");
    }
    catch(err) {
      alert(err);
    }     
  }); 

}); 

   function openmodal(suffixtable){
          var options = {
              "backdrop" : "true",
              "keyboard" : true,
              "show" : true
          }
          $('#ssModal'+suffixtable).on('hidden.bs.modal', function () {
                   // alert("Modal hidden 2");
              $('body').addClass('modal-open');
              $('#ssmodal-body'+suffixtable).empty();
                    
          })
          $('#ssModal'+suffixtable).on("hidden.bs.modal",'#ssmodal-body'+suffixtable, function() {
                  //  alert("Modal hidden");
                    //$('#ssmodal-body'+suffixtable).html("Where did he go?!?!?!");
                  }).modal(options);
        
  }
            

$(function () {
  
      $(document).on("click", "button[tipo=\"salva\"]", function(event){
          event.stopImmediatePropagation(); 
      		if (deb){alert("salva modal")};
          suffixtable= $(this).attr("suffixtable");
          ssfieldattruniqueform= $(this).attr("ssfieldattruniqueform");
      		var form = $("#data-form"+ssfieldattruniqueform);
          lev=form.attr("lev");
      		sect=form.attr("sect");
          tipo=form.attr("tipo");
      		form.attr("action", "index.php?sect="+sect+"&lev="+lev+"&lev2="+"salva");
          if (validate()){
              tinyMCE.triggerSave(); // deve essere eseguito al fine di passare il contenuto aggiornato all'ajax
              var _data = new FormData(form[0]); 
              fileCount=0;
              $("input[type=file]").each(function() {
                  _data.append('nw_immagine'+fileCount,$(this));
                  fileCount++;
              });
             // alert(form.attr("action"));
              $.ajax({
                  url: form.attr("action"),
                  type: 'POST',
                  data: _data,    
                  maxFileSize: 1024 * 1024,
                  async: false,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function(data){
                      $("#ssmodal-title"+suffixtable).html( "<h2 class=\"ssMessaggioOk\">Operazione Eseguita Con Successo</h2>").fadeIn( 300 ).delay( 800 ).slideUp( 400 );
                      $("#ssmodal-title"+suffixtable+" > h2").css("background-color","#00CC00");
                      $("#ssModal"+suffixtable).scrollTop(0);
                      //alert("#buttonrefresh"+suffixtable);
                      $("#buttonrefresh"+suffixtable).delay(4000).trigger("click");
                      $("#ssclose"+suffixtable).trigger("click");

                  }
              });
          }else{
            alert("Errore nel controllo campi");
          }
   });
});    
 
// ultima variabile
var isloaded=true;
