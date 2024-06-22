<footer class="footer">
    <div class="container-fluid">
      <nav class="float-left">
        <ul>
          <li>
            <a href="{{url('/')}}">
              {{ __('Website')}}
           </a>
         </li>
         <li>
           <a href="{{url('/')}}/blog">
               {{ __('Blog') }}
           </a>
         </li>
         <li>
           <a href="{{url('/')}}/dashboard">
               {{ __('Dashboard') }}
           </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>All Rights Reserved.
      </div>
    </div>
  </footer>