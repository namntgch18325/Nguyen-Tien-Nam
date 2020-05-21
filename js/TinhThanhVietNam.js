
var option = "";
var jqxhr = $.getJSON("/NhaTro/tinhthanhpho.json", function(data) {

   for(var i=0;i<data.TinhThanh.length;i++)
   {
    option += "<option value = "+data.TinhThanh[i].matp+">" + data.TinhThanh[i].name +"</option>";
   }
   $(option).appendTo('#slTinhThanh');
})
  .done(function() {
    console.log( "second success" );
  })
  .fail(function() {
    console.log( "error" );
  })
  .always(function() {
    console.log( "complete last" );
  });

    var idTP = 1;
    var option2 = "";
    var jqxhr = $.getJSON("/NhaTro/quanhuyen.json", function(data) {
   for(var i=0;i<data.QuanHuyen.length;i++)
   {
     if(idTP == data.QuanHuyen[i].matp)
     option2 += "<option value = "+data.QuanHuyen[i].maqh+">" + data.QuanHuyen[i].name +"</option>";
   }
   $("#sl").empty();
   $(option2).appendTo('#sl');
}).done(function() {
    console.log( "second success" );
  }).fail(function() {
    console.log( "error" );
  }).always(function() {
    console.log( "complete last" );
  });

    var idQH = 001;
    var option3 = "";
    var jqxhr = $.getJSON("/NhaTro/xaphuongthitran.json", function(data) {
    for(var i=0;i<data.XaPhuong.length;i++)
    {
        if(data.XaPhuong[i].maqh == idQH)
        option3 += "<option value = "+data.XaPhuong[i].xaid +">" + data.XaPhuong[i].name +"</option>";
    }
    $("#slXaPhuong").empty();
    $(option3).appendTo('#slXaPhuong');
}).done(function() {
    console.log( "second success" );
  }).fail(function() {
    console.log( "error" );
  }).always(function() {
    console.log( "complete last" );});
function GetQuanHuyen()
{
  var e = document.getElementById("slTinhThanh");
  var idTP = e.options[e.selectedIndex].value;
    var option = "";
    var jqxhr = $.getJSON("/NhaTro/quanhuyen.json", function(data) {

   for(var i=0;i<data.QuanHuyen.length;i++)
   {
     if(idTP == data.QuanHuyen[i].matp)
    option += "<option value = "+data.QuanHuyen[i].maqh+">" + data.QuanHuyen[i].name +"</option>";
   }
   $("#sl").empty();
   $(option).appendTo('#sl');
})
  .done(function() {
    console.log( "second success" );
  })
  .fail(function() {
    console.log( "error" );
  })
  .always(function() {
    console.log( "complete last" );
  });
}

function GetPhuongXa()
{
  var e = document.getElementById("sl");
  var idQH = e.options[e.selectedIndex].value;
 // alert(idQH);
var option = "";
var jqxhr = $.getJSON("/NhaTro/xaphuongthitran.json", function(data) {

   for(var i=0;i<data.XaPhuong.length;i++)
   {
     if(data.XaPhuong[i].maqh == idQH)
    option += "<option value = "+data.XaPhuong[i].xaid +">" + data.XaPhuong[i].name +"</option>";
   }
   $("#slXaPhuong").empty();
   $(option).appendTo('#slXaPhuong');
})
  .done(function() {
    console.log( "second success" );
  })
  .fail(function() {
    console.log( "error" );
  })
  .always(function() {
    console.log( "complete last" );
  });
}

