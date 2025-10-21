@props(['page'])
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">{{ucfirst($page)}}</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">{{lcfirst($page)}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
