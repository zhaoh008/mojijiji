window.onscroll = function(){
        var t = document.documentElement.scrollTop || document.body.scrollTop;
        var top_div = document.getElementById( "to-top" );
        if( t >= 300 ) {
            top_div.style.display = "block";
        } else {
            top_div.style.display = "none";
        }
    }
var currentPosition,timer;
function GoTop(){
    timer=setInterval("runToTop()",1);
}
function runToTop(){
    currentPosition=document.documentElement.scrollTop || document.body.scrollTop;
    currentPosition-=100;
    if(currentPosition>0)
    {
        window.scrollTo(0,currentPosition);
    }
    else
    {
        window.scrollTo(0,0);
        clearInterval(timer);
    }
}
//校验
$(document).ready(function() {
    //搜索校验
    $('#mysearch,#yoursearch').bootstrapValidator({
        message: 'This value is not valid',
//excluded:[":hidden",":disabled",":not(visible)"] ,//bootstrapValidator的默认配置
        excluded: ':disabled',//关键配置，表示只对于禁用域不进行验证，其他的表单元素都要验证

        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',//显示验证成功或者失败时的一个小图标
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            search: {
                message: '总要填点啥吧？',//默认提示信息
                validators: {
                    notEmpty: {
                        message: '总要填点啥吧？'
                    },
                    stringLength: {
                        min: 2,
                        max: 10,
                        message: '2到10个关键字哟。。'
                    },


                }
            }
        }
    }).on('error.form.bv', function(e) {
        console.log('error');
        // Active the panel element containing the first invalid element
        var $form         = $(e.target),
            validator     = $form.data('bootstrapValidator'),
            $invalidField = validator.getInvalidFields().eq(0),
            $collapse     = $invalidField.parents('.collapse');

        $collapse.collapse('show');
    });
});
// 登陆校验
$(function () {
    $('#login').bootstrapValidator({
        message: 'This value is not valid',
//excluded:[":hidden",":disabled",":not(visible)"] ,//bootstrapValidator的默认配置
        excluded: ':disabled',//关键配置，表示只对于禁用域不进行验证，其他的表单元素都要验证

        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',//显示验证成功或者失败时的一个小图标
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            phone: {
                message: '老铁手机号必填没毛病( ͡° ͜ʖ ͡°)',//默认提示信息
                validators: {
                    notEmpty: {
                        message: '手机号必填没毛病( ͡° ͜ʖ ͡°)'
                    },
                    stringLength: {
                        min: 11,
                        max: 11,
                        message: '11位ლ(•̀ _ •́ ლ)'
                    },
                    regexp: {
                        regexp: /^[1][3,4,5,6,7,8,9][0-9]{9}$/,
                        message: '乖乖◔ ‸◔手机号格式错了'
                    },

                }
            },
            password: {
                message: '密码必填没毛病( ͡° ͜ʖ ͡°)',//默认提示信息
                validators: {
                    notEmpty: {
                        message: '密码必填没毛病( ͡° ͜ʖ ͡°)'
                    },
                    stringLength: {
                        min: 8,
                        max: 16,
                        message: '8到16位ლ(•̀ _ •́ ლ)'
                    },
                    regexp: {
                        regexp:/^[A-Za-z0-9]{8,16}$/,
                        message: '数字、字母、数字+字母(つω｀)～。'
                    },

                }
            },
        }
    }) .on('success.form.bv', function(e) {
        // Prevent form submission
        e.preventDefault();

        // Get the form instance
        var $form = $(e.target);

        // Get the BootstrapValidator instance
        var bv = $form.data('bootstrapValidator');

        // Use Ajax to submit form data
        $.ajax({
            url:'/index/user/loginin',
            type:"POST",
            data:$form.serialize(),
            success:function (result) {
                $('#myModal').modal('hide');
                $("#success").text(result);
                $("#alert").fadeIn(300);
                setTimeout(function () {
                    $("#alert").hide(300);
                    location.reload();
                },3000);

            }
        })
    });

});
//注册校验
$(function () {
    $('#register').bootstrapValidator({
        message: 'This value is not valid',
//excluded:[":hidden",":disabled",":not(visible)"] ,//bootstrapValidator的默认配置
        excluded: ':disabled',//关键配置，表示只对于禁用域不进行验证，其他的表单元素都要验证
       // submitButtons: '#submitBtn',

        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',//显示验证成功或者失败时的一个小图标
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            phone: {
                message: '手机号必填没毛病( ͡° ͜ʖ ͡°)',//默认提示信息
                validators: {
                    notEmpty: {
                        message: '手机号必填没毛病( ͡° ͜ʖ ͡°)'
                    },
                    stringLength: {
                        min: 11,
                        max: 11,
                        message: '11位◐▽◑'
                    },
                    regexp: {
                        regexp: /^[1][3,4,5,6,7,8,9][0-9]{9}$/,
                        message: '乖乖◔ ‸◔手机号格式错了'
                    },
                    remote: {
                        url: '/api/phoneapi/checkphone',
                        message:"该手机已被注册了 (ฅ´ω`ฅ)",
                        delay:2000,
                        type:'POST',
                    },

                }
            },
            yanzhengma: {
                message: '验证码必填没毛病( ͡° ͜ʖ ͡°)',//默认提示信息
                validators: {
                    notEmpty: {
                        message: '验证码必填没毛病( ͡° ͜ʖ ͡°)'
                    },
                    stringLength: {
                        min: 6,
                        max: 6,
                        message: '6位纯数字'
                    },
                    regexp: {
                        regexp:/^[0-9]*$/,
                        message: '6位纯数字◐▽◑'
                    },
                    remote: {
                        url: '/api/sendsms/checkcode',
                        message:"验证码错误✿ ✿半天没收到就是我没钱买短信了(｡◕‿◕｡)",
                        delay:2000,
                        type:'POST',

                    },
                }
            },
            username: {
                message: '名字必须有(｡◕‿◕｡)',//默认提示信息
                validators: {
                    notEmpty: {
                        message: '名字必填没毛病( ͡° ͜ʖ ͡°)'
                    },
                    stringLength: {
                        min: 1,
                        max: 8,
                        message: '1到8个字符✿'
                    },
                }
            },
            password: {
                message: '老铁密码必填没毛病( ͡° ͜ʖ ͡°)',//默认提示信息
                validators: {
                    notEmpty: {
                        message: '密码必填没没毛病( ͡° ͜ʖ ͡°)'
                    },
                    stringLength: {
                        min: 8,
                        max: 16,
                        message: '8到16位✿'
                    },
                    different: {
                        field: 'phone',
                        message: '手机和密码不能相同。'
                    },
                    regexp: {
                        regexp:/^[A-Za-z0-9]{6,16}$/,
                        message: '数字、字母、数字+字母(つω｀)～。。'
                    },

                }
            },
            againpassword: {
                message: '再次输入密码(눈_눈)',//默认提示信息
                validators: {
                    notEmpty: {
                        message: '再次输入密码(눈_눈)'
                    },
                    stringLength: {
                        min: 8,
                        max: 16,
                        message: '8到16位Orz'
                    },
                    regexp: {
                        regexp:/^[A-Za-z0-9]{8,16}$/,
                        message: '数字、字母、数字+字母(つω｀)～。。'
                    },
                    identical: {
                        field: 'password',
                        message: '两次输入密码不相同'
                    },


                }
            },
        }
    })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.ajax({
                url:'/index/user/register',
                type:"POST",
                data:$form.serialize(),
                success:function (result) {
                    $("#success").html(result)
                    $("#alert").fadeIn(300);
                    setTimeout(function () {
                        $("#alert").hide(300);
                        location.reload();
                    },3000);
                    $('#myModal').modal('hide');

                }
            })
        });

    //
});
//手机号通过验证后，改变发送验证码按钮

//评论区函数
// 评论内容展开
$(function(){
    var slideHeight = 75; // px
    var defHeight = $('#wrap').height();
    if(defHeight >= slideHeight){
        $('#wrap').css('height' , slideHeight + 'px');
        $('#read-more').append('<a >展开</a>');
        $('#read-more a').click(function(){
            var curHeight = $('#wrap').height();
            if(curHeight == slideHeight){
                $('#wrap').animate({
                    height: defHeight
                }, "normal");
                $('#read-more a').html('收起');
                $('#gradient').fadeOut();
            }else{
                $('#wrap').animate({
                    height: slideHeight
                }, "normal");
                $('#read-more a').html('展开');
                $('#gradient').fadeIn();
            }
            return false;
        });
    }
});
// 回复展开变名字
$(document).ready(function(){
    var a= $("#fuck").text();
    $("#fuck").click(function(){

        if(a== $("#fuck").text()){
            $("#fuck").text("隐藏回复");

        }
        else{

            $("#fuck").text("展开2条回复");
        }
    });

});


//定位回复框
$(document).ready(function () {
    $('#comment-collapse').on('show.bs.collapse', function () {
        $('html, body').animate({
            scrollTop: $("#miao").offset().top
        });
    })
});
$(function () {
    var wait=60;
    $("#sendsms").click(
        function time() {
            if (wait == 0) {
                $("#sendsms").html("重新获取验证码");
                $("#sendsms").removeClass("disabled");
                wait = 60;
            } else {
                $("#sendsms").addClass("disabled");
                $("#sendsms").html("●ω●等"+wait+"s再点");
                wait--;
                setTimeout(function () {
                    time();
                }, 1000)
            }
        }

    )
});
//获取短信验证码
$(function () {
    $("#sendsms").click(function () {
        $code=$("#phone").val();

        $.ajax({
            url:"/api/sendsms/checksms",
            data: {phone:$code},
            type:"POST",
            success:function (result) {
                $("#success").html(result);
                $("#alert").fadeIn(300);
                setTimeout(function () {
                    $("#alert").hide(300);
                },3000);
            }
        })

    });
});
//注销登录
$(function () {
    $(".loginout").click(
        function () {
            $.ajax(
                {
                    url:"/index/user/loginout",
                    type:"POST",
                    success:function (result) {
                        $("#success").html(result)
                        $("#alert").fadeIn(300);
                        setTimeout(function () {
                            $("#alert").hide(300);
                            location.reload();
                        },3000);
                    }
                }

            )
        }
   );
});
