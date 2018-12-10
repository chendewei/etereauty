function myorder(){
    var inps = $('.address').find('input')
    var btnIndex =  localStorage.getItem('btnIndex');
    if(btnIndex){
        $('.method>div').removeClass('active')
        $('.method>div').eq(btnIndex).addClass('active')
        $('.pay-bot button').hide()
        $('.pay-bot button').eq(btnIndex).show()
    }else{
        $('.pay-method>div').eq(0).addClass('active') 
    }
    if(inps.val() !=''){
        inps.addClass('off').attr('disabled','disabled')
        $('.address .edit').show()
        $('.address .save').hide()
        $('.next-btn').show()
    }
    $('.address .save').on("click",function(){
        var form = $(this).parents('form')
        var data = form.serialize()
        var inp = form.find('.inp-imp')
        var allInp = form.find('input')
        var _this = this
        for(var i = 0; i < inp.length; i++){
            if($(inp[i]).val() == ''){
                var text = $(inp[i]).parents('.item').find('.msg').text()
                $(inp[i]).focus()
                form.find('.error').text("Please Enter Your " + text).fadeIn()
                return false
            }else{
                form.find('.error').text('').hide()
            }
        }
        $.ajax({
            url:form.attr("action"),
            type:'post',
            data:data,
            success:(res) => {
                prompt('Successfully saved')
                $(_this).hide()
                $('.next-btn').show()
                allInp.attr('disabled','disabled').addClass('off')
                $('.address .edit').show()
            },
            error: () => {
                prompt('Save failed')
            }
        })
        return false
    })
    $('.method>div').on('click',function(){
        $(this).siblings('div').removeClass('active')
        $(this).addClass('active')
        var index = $(this).index()
        $('.pay-bot button').hide()
        $('.pay-bot button').eq(index).show()
        localStorage.setItem("btnIndex",index)
    })
    $('.mode>div').on('click',function(){
        $(this).siblings('div').removeClass('active')
        $(this).addClass('active')
    })
    $('.address .edit').on('click',function(){
        var form = $(this).parents('form')
        var allInp = form.find('input')
        allInp.attr('disabled',false).removeClass('off')
        $(this).hide()
        $('.address .save').show()
    })

}
myorder()