<nav id="sidebar" role="navigation" data-step="2"
     data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
     data-position="right" class="navbar-default navbar-static-side">
    <div class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">

            <div class="clearfix"></div>
            <li><a href="dashboard"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Dashboard</span></a></li>
            <li id="menu-user">
                <a href="{!! route('page.user') !!}">
                    <i class="fa fa-send-o fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i>
                    <span class="menu-title">User</span></a>
            </li>
            <li id="menu-barang">
                <a href="{!! route('page.barang') !!}">
                    <i class="fa fa-send-o fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i>
                    <span class="menu-title">Barang</span></a>
            </li>
            <li id="menu-peminjaman">
                <a href="{!! route('page.peminjaman') !!}">
                    <i class="fa fa-send-o fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i>
                    <span class="menu-title">Peminjaman</span></a>
            </li>
            <li id="menu-pengembalian">
                <a href="{!! route('page.pengembalian') !!}">
                    <i class="fa fa-send-o fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i>
                    <span class="menu-title">pengembalian</span></a>
            </li>
        </ul>
    </div>
</nav>