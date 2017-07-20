<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>
        企业邮箱哪家好_企业邮箱怎么注册_企业邮箱怎么申请-
        @if(isset($obj['domain_name']))
            {{$obj['domain_name']}}
        @endif
    </title>
    <meta content="企业邮箱哪家好,企业邮箱怎么注册,企业邮箱怎么申请,如何申请企业邮箱,企业邮箱注册申请" name="description">
    <meta content="网易企业邮箱,20年运营经验,安全稳定,高速收发,超强反垃圾!300人售后团队24小时在线服务,支持免费试用,自助开通,买2年送2年" name="description">
    <script src="../templatestatic/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="../templatestatic/jquery.SuperSlide.js"></script>
    <link href="../templatestatic/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div class="top">
    <div class="logo">企业邮箱网<span>www.qiyemail.com</span></div>
</div>


<div class="yuming_box">
    <div class="ym_title"><h1>域名注册</h1></div>
    <table>
        <tr>
            <td class="tb-title">域名</td>
            <td>
                @if(isset($obj['domain_name']))
                    <a href="http://{{$obj['domain_name']}}" target="_blank">{{$obj['domain_name']}}</a>
                @endif
            </td>
        </tr>
        <tr>
            <td class="tb-title">注册人</td>
            <td>
                @if(isset($obj['registrant_name']))
                    {{$obj['registrant_name']}}
                @endif
            </td>
        </tr>
        <tr>
            <td class="tb-title">注册时间</td>
            <td>
                @if(isset($obj['createdate']))
                    {{date("Y-m-d H:i:s",$obj['createdate'])}}
                @endif
            </td>
        </tr>
        <tr>
            <td class="tb-title">过期时间</td>
            <td>
                @if(isset($obj['expiresdate']))
                    {{date("Y-m-d H:i:s",$obj['expiresdate'])}}
                @endif
            </td>
        </tr>
        <tr>
            <td class="tb-title">注册城市</td>
            <td>
                @if(isset($obj['registrant_city']))
                    {{$obj['registrant_city']}}
                @endif
            </td>
        </tr>
        <tr>
            <td class="tb-title">注册邮箱</td>
            <td>
                @if(isset($obj['contact_email']))
                    {{$obj['contact_email']}}
                @endif
            </td>
        </tr>
        <tr>
            <td class="tb-title">网站标题</td>
            <td>
                @if(isset($obj['wwwtitle']))
                    {{$obj['wwwtitle']}}
                @endif
            </td>
        </tr>
        <tr>
            <td class="tb-title">邮箱标题</td>
            <td>
                @if(isset($obj['contact_email']))
                    {{$obj['contact_email']}}
                @endif
            </td>
        </tr>
    </table>
</div>

<div class="mx_box">
    <div class="mx_title"><h1>MX记录</h1></div>
    <table>
        <tr class="mx-tm">
            <td>mx</td>
            <td>品牌</td>
            <td>优先级</td>
        </tr>
        <tr>
            @if(isset($obj['mx']))
            <td>
                @if(isset($obj['mx']->mx))
                {{$obj['mx']->mx}}
                @endif
            </td>
            <td>
                @if(isset($obj['mx']->brand_name))
                    {{$obj['mx']->brand_name}}
                @endif
               </td>
            <td>
                @if(isset($obj['mx']->priority))
                    {{$obj['mx']->priority}}
                @endif
            </td>
            @endif
        </tr>
    </table>
</div>

<form id="theform_bottom" name="theform_bottom">
    <input type="hidden" name="shuaidan_type" value="1">
    <div class="dy03_biaodan">
        <h1>亲爱的用户，请填写以下信息参加活动</h1>
        <div>
            <label>公司名称：</label>
            <input type="text" name="company" id="company" placeholder="请输入公司名称">
            <div class="clearfix"></div>
        </div>
        <div>
            <label>联系电话：</label>
            <input type="text" name="phone" id="userphoneSales" placeholder="请输入联系电话">
            <div class="clearfix"></div>
        </div>
        <div>
            <label>联系人：</label>
            <input type="text" name="name" id="userNameSales" placeholder="请输入联系人">
            <div class="clearfix"></div>
        </div>
        <div>
            <label>联系邮箱：</label>
            <input type="text" name="email" id="email" placeholder="请输入联系邮箱">
            <!--这个参数是从搜索引擎中来-->
            <!--搜索引擎-->
            <!--搜索引擎传递过来的地域信息-->
            <!--位置信息 比如是qiangbi  还是胜途的区分-->
            <input type="hidden" value="qiangbi" name="pos"/>
            <!--表示是谁的客户 表示salesmen 中的 职员的id-->
            <div class="clearfix"></div>
        </div>
        <input class="btn" name="submit_bottom" type="button" id="submit_bottom" value="马上参加">
    </div>
</form>
<script type="text/javascript">
    $(function () {
        $('#submit_bottom').click(function () {
            var data = $('#theform_bottom').serialize();
            var url = 'http://salesman.cc/index.php/Shuaidan_ceshi/PublicTry/index';
            var name = $("#userNameSales").val();
            var phone = $("#userphoneSales").val();
            var email = $("#email").val();
            var company = $("#company").val();
            $("#theform_bottom")[0].reset();
            $.ajax({
                type: "POST",
                dataType: "json",
                //因为如果是异步执行的话  没有返回就执行return 了 但是同步的话还是会有问题的 比如长时间没有相应的话会阻塞
                async: true,
                url: url,
                data: data,
                success: function (data) {
                    if (data.status == 20) {
                        $("#userNameSales").val(name);
                        $("#userphoneSales").val(phone);
                        $("#email").val(email);
                        $("#company").val(company);
                    }
                    alert(data.msg);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('尊敬的用户，我们已经收到您的请求，稍后会有专属客服为您服务。');
                }
            });
        });
    })
</script>


<div class="pptj">
    <div class="wz_title">
        <a href="">
            <span class="ppw">邮箱品牌推荐</span><span class="gd">更多 &nbsp;>>&nbsp;</span>
            <div class="clearfix"></div>
        </a>
    </div>
    <ul>
        <li><a href=""><img src="../templatestatic/l1.jpg"></a></li>
        <li><a href=""><img src="../templatestatic/l2.jpg"/></a></li>
        <li><a href=""><img src="../templatestatic/l3.jpg"/></a></li>
        <li><a href=""><img src="../templatestatic/l4.jpg"/></a></li>
        <li><a href=""><img src="../templatestatic/l5.jpg"/></a></li>
        <li><a href=""><img src="../templatestatic/l6.jpg"/></a></li>
        <li><a href=""><img src="../templatestatic/l7.jpg"/></a></li>
        <li><a href=""><img src="../templatestatic/l8.jpg"/></a></li>
        <li><a href=""><img src="../templatestatic/l7.jpg"/></a></li>
        <li><a href=""><img src="../templatestatic/l8.jpg"/></a></li>
        <div class="clearfix"></div>
    </ul>
</div>

<div class="bottom">
    <div class="end">
        <div class="el">
            <div class="dxx">
                全国企业邮箱服务电话：4006-360-163<br/>
                © 2004-2012 北京强比科技有限公司&nbsp;&nbsp;&nbsp;&nbsp; 济南强比科技有限公司&nbsp;&nbsp;&nbsp;&nbsp; 中国企业邮箱网
            </div>
        </div>
        <div class="er"><img src="../templatestatic/er.jpg"/></div>
    </div>
</div>
</body>
</html>
