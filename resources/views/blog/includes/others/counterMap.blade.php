@if (env('APP_ENV') == 'production')
<div class="w3-card-2">
    <div class="box box-default">
      <div class="box-header with-border">
         <i class="fa fa-globe"></i> Our Website & Blog Visitors  
      </div>    
      <div class="box-body">

        {{-- <script type="text/javascript" id="clstr_globe" src="{{ asset('//cdn.clustrmaps.com/globe.js?d=QoEcJl3taHE5VjWTdDZbaoBwWvluBPIcrLNoHj9qEB0') }}"></script> --}}

        <script type="text/javascript" id="clustrmaps" src="{{ asset('//cdn.clustrmaps.com/map_v2.js?d=QoEcJl3taHE5VjWTdDZbaoBwWvluBPIcrLNoHj9qEB0&cl=ffffff&w=a') }}"></script>


    </div>
</div>
</div>
@endif