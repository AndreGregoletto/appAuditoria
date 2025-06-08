<x-layout-default>
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" id="arquivo" name="arquivo">
        <button type="submit">enviar</button>
    </form>

    <button onclick="destroy()">Destroy</button>
    <script>
        const baseUrl = window.location.origin;

        function destroy() {
            const inputFile = document.getElementById('arquivo');
            if (inputFile.files.length === 0) {
                alert("Por favor, selecione um arquivo.");
                return;
            }

            const formData = new FormData();
            formData.append('arquivo', inputFile.files[0]);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: `${baseUrl}/test/`,
                async: true,
                data: formData,
                contentType: false,
                processData: false, 
                success: function(data) {
                    console.log("Arquivo enviado com sucesso:", data);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao enviar o arquivo:", error);
                }
            });
        }
    
    </script>
</x-layout-default>