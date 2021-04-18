




    <div class="sidebar-heading text-center col-sm-12 pr-1 pl-1" style="width: 269px">{{ $image->barangay_name ?? 'Barangay no set' }}</div>
    <link rel="icon"
    type="image/png"
    href="{{  Storage::url($image->image ?? 'Logo not set')  }}">
    <div class="sidebar-heading container-fluid text-center pr-0 pl-0 ">
        <img class="logo" style="width: 280px" src="{{  Storage::url($image->image ?? 'Logo not set')  }}">

    </div>
