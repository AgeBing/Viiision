@extends('main')

@section('maincontent')
<main class="container" style="padding-top: 15px;">
    <div class="spots-main-ctner">
        <div class="app-detail card row">
            <div class="col s1" style="padding-top: 13px;">
                <a href="viewgraph">
                    <img src="http://is5.mzstatic.com/image/thumb/Purple111/v4/11/65/10/116510d8-cae3-87c4-71f6-2f33b026b183/mzl.iqdpfwrh.png/175x175bb-85.jpg"
                    width="60" height="60" style="border-radius: 5px;" alt="app-picture">
                </a>
            </div>
            <div class="col s10">
                <p>
                <h5>Faceu</h5>
                <div class="update">
                    更新时间：
                    <span class="update-time">2017-04-22 09:21:22</span>
                </div>
                </p>
            </div>
            <div class="col s1" style="padding-top: 23px;">
                <a class="btn-floating btn-middle red">
                    <i class="large material-icons">add</i>
                </a>
            </div>
        </div>
    </div>
</main>
@stop