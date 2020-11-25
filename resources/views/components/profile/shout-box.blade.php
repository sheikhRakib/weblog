<!-- Shoutbox -->
<div>
    <div class="card card-prirary cardutline direct-chat direct-chat-primary">
        <div class="card-header">
            <h3 class="card-title">Shoutbox</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="direct-chat-messages">
                <div class="direct-chat-msg" id="shoutbox">
                    @foreach ($shouts as $shout)
                    <div class="direct-chat-infos">
                        <span class="direct-chat-name">{{ $shout->sender->name }}</span>
                        <span class="direct-chat-timestamp float-right">{{ $shout->time }}</span>
                        <span class="direct-chat-text">{{ $shout->message }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="input-group">
                <input type="text" id="message" name="message" placeholder="Type Message ..." class="form-control"
                    autofocus>
                <input type="hidden" id="lsID" value="{{ $lastShoutID }}">
                <span class="input-group-append">
                    <button type="submit" id="shout" class="btn btn-primary">Send</button>
                </span>
            </div>
        </div>
    </div>

    <script>
        $('body').keypress(function (e) {
            if (e.keyCode == 13) {
                $('#shout').click();
            }
        });

    </script>

    <!-- Ajax -->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#shout').on('click', function (e) {
                let message = $("#message").val();

                if (!message) return;
                $("#message").val("");

                $.ajax({
                    url: "{{ route('ajax.sendShouts') }}",
                    type: "POST",
                    data: {
                        message: message,
                    },

                    success: function (data) {
                        console.log(data.success);
                    },
                    error: function (data, textStatus, errorThrown) {
                        console.log(data);
                    },
                })
            });
        });

    </script>

    <script>
        // Request new messages
        function shoutBox() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let lsID = $("#lsID").val();

            $.ajax({
                url: "{{ route('ajax.getShouts') }}",
                type: "POST",
                data: {
                    lsID: lsID,
                },

                success: function (data) {
                    if (data.shoutID > lsID) {
                        $("#lsID").val(data.shoutID);

                        $.each(data.shouts, function (index, shout) {
                            $("#shoutbox").prepend(
                                "<div class=\"direct-chat-infos\">" +
                                "<span class=\"direct-chat-name\">" + shout.name + "</span>" +
                                "<span class=\"direct-chat-timestamp float-right\">" + shout.time + "</span>" +
                                "<span class=\"direct-chat-text\">" + shout.message +
                                "</span>" +
                                "</div>"
                            )
                        })
                    }
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            })
        }

        $(document).ready(function () {
            myVar = setInterval("shoutBox()", 2000);
        });

    </script>
</div>
<!-- ./Shoutbox -->
