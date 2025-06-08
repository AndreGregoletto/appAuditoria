<x-layout-default>
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-8">
                    <div class="mb-3">
                        <label for="arquivo" class="form-label"></label>
                        <input class="form-control" type="file" type="file" id="arquivo" name="arquivo" multiple>
                    </div>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-success w-100">Enviar</button>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-secondary w-100" onclick="clearInput('#arquivo')">Limpar</button>
                </div>
            </div>
        </div>
    </form>
    <hr>
</x-layout-default>