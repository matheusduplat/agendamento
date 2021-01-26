


    
   
    
    @include("layouts.includes.head")
    <div id="preload" class="preload">
  <div class="loading-page">
    <div class="counter">
      <p>loading</p>
      <h1>0%
        
      </h1>
      <hr/>
    </div>
  </div>

</div>
    <body  id="tudo_page" class="hold-transition sidebar-mini layout-fixed">
  
    <div class="wrapper">
    @include("layouts.includes.headervisi")
    <main class="py-4">
            @yield('content')
        </main>
 
</div>

@include("layouts.includes.footer")
</body>
<script>

      jQuery(window).load(function () {
      $("#preload").delay(3000).fadeOut("slow"); //retire o delay quando for copiar!
    $("#tudo_page").body("show");
});
</script>

</html>
