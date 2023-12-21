<script>
    var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}'
    });

    var channel = pusher.subscribe('price-channel-local');
    channel.bind('price-updated', function(data) {
        // alert(JSON.stringify(data));

        iziToast.success({
            message: `${data.coin_name} Price Updated: ${data.price}`,
            position: "topRight"
        });

        $(`input[name=price_${data.coin_id}]`).val(data.price);
        $(`#coin_price_${data.coin_id}`).html(data.price);
    });
</script>
