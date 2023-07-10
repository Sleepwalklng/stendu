$(document).ready(function () {
    $('#subscribe').click(function (e) {
        let that =$(this)
        e.preventDefault()
        const userId = $(this).attr('data-id')
        const oper = $(this).attr('data-oper')
        $.ajax({
            type: 'post',
            url: '/ajax/seller_subscription.php',
            data: {userId: userId, oper: oper},
            dataType: 'json',
            success: function (data) {
                if (data == 1) {
                    alert('Вы подписались на продавца!')
                    that.find('.link__text').text('Отписаться')
                    that.attr('data-oper', 'unsubscribe')
                } else if (data == 2) {
                    alert('Вы не можете подписаться на себя!')
                } else if (data == 0) {
                    alert('Вы уже подписаны на этого продавца!')
                } else if (data == 4) {
                    alert('Вы отписались от продавца!')
                    that.find('.link__text').text('Подписаться на продавца')
                    that.attr('data-oper', 'subscribe')
                }else {
                    alert(data)
                }
            },
            error: function (data) {
                console.log(false);
            },
        });
        return false;
    })
//отписка
    $('#unsubscribelk').click(function (e) {
        e.preventDefault()
        const userId = $(this).attr('data-id')
        $.ajax({
            type: 'post',
            url: '/ajax/seller_subscription.php',
            data: {userId: userId, oper: 'unsubscribe'},
            dataType: 'json',
            success: function (data) {
                if (data == 4) {
                    $('#seller-' + userId).remove()
                } else {
                    alert(data)
                }
            },
            error: function (data) {
                console.log(false);
            },
        });
        return false;
    })

})