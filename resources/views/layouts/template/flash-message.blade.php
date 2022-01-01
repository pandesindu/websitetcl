@if ($message = Session::get('success'))
    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-emerald-500">
        <span class="text-xl inline-block mr-5 align-middle">
          <i class="fas fa-bell"></i>
        </span>
        <span class="inline-block align-middle mr-8">
          <b class="capitalize">sukses!</b> {{$message}}
        </span>
        <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
          <span>×</span>
      
        </button>
      </div>
@endif
  
@if ($message = Session::get('error'))
        <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
            <span class="text-xl inline-block mr-5 align-middle">
            <i class="fas fa-bell"></i>
            </span>
            <span class="inline-block align-middle mr-8">
            <b class="capitalize">hey!</b> {{$message}}
            </span>
            <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
            <span>×</span>
        
            </button>
        </div>
@endif
   
@if ($message = Session::get('warning'))
<div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-amber-500">
    <span class="text-xl inline-block mr-5 align-middle">
      <i class="fas fa-bell"></i>
    </span>
    <span class="inline-block align-middle mr-8">
      <b class="capitalize">peringatan!</b> {{$message}}
    </span>
    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
      <span>×</span>
  
    </button>
  </div>
@endif
   
@if ($message = Session::get('info'))
    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-lightBlue-500">
        <span class="text-xl inline-block mr-5 align-middle">
        <i class="fas fa-bell"></i>
        </span>
        <span class="inline-block align-middle mr-8">
        <b class="capitalize">lightBlue!</b> This is a pink alert - check it out!
        </span>
        <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
        <span>×</span>
    
        </button>
    </div>
@endif
  
@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    Please check the form below for errors
</div>
@endif

<script>
    function closeAlert(event){
      let element = event.target;
      while(element.nodeName !== "BUTTON"){
        element = element.parentNode;
      }
      element.parentNode.parentNode.removeChild(element.parentNode);
    }
  </script>