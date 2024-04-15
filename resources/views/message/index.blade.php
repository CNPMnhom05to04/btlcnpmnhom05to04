<div class="mesgs">
    <div class="msg_history">
        @foreach($messages as $message)
            @if($message->from !== Auth::id())
                <div class="incoming_msg">
                    <div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png"
                                                       alt="sunil"></div>
                    <div class="received_msg">
                        <div class="received_withd_msg">
                            <p>{{ $message->message }}</p>
                            <span class="time_date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</span>
                        </div>
                    </div>
                </div>
            @else
                <div class="outgoing_msg">
                    <div class="sent_msg">
                        <p>{{ $message->message }}</p>
                        <span class="time_date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</span></div>
                </div>
            @endif
        @endforeach
    </div>
    @csrf
    <div class="type_msg input-text" id="chat-box">
        <div class="input_msg_write">
            <input type="text" name="message" class="submit write_msg" placeholder="Type a message"/>
            <input type="file" name="file" id="file" multiple hidden />
            <button class="msg_send_btn" style="margin-right: 50px" type="button" onclick="openInput();"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            <button class="msg_send_btn" type="button" onclick="sendMessage();"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
        </div>
        <div id="file-display" class="file-display" style="display: none">
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var mesgsContainer = $(".mesgs");
        var fileInput = document.getElementById('file');

        mesgsContainer.on('dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).addClass('dragover');
        });

        mesgsContainer.on('dragleave', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('dragover');
        });

        mesgsContainer.on('drop', function (e) {
            e.preventDefault();
            e.stopPropagation();

            mesgsContainer.removeClass('dragover');

            var files = e.originalEvent.dataTransfer.files;

            // Reset the file input
            fileInput.files = files;

            // Display file name in the input
            displayFileNames(files);
        });

        fileInput.addEventListener('change', handleFileSelect);

        function handleFileSelect(event) {
            var files = event.target.files;

            // Display file name in the input
            displayFileNames(files);
        }

        function displayFileNames(files) {
            var fileNameDisplay = $("#file-display");
            fileNameDisplay.empty();

            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var fileName = document.createElement('p');
                fileName.textContent = file.name;
                fileNameDisplay.append(fileName);
            }
        }
    });
</script>


