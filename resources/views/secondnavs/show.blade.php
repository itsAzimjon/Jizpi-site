@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-5">{{ __($secondnav->title)}}</h2>
    @auth   
        @if(!$hasPdfAttached)
            <a href="{{ route('thirdnavs.build', ['thirdnav'=> $secondnav->id])}}" class="btn btn-info">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                </svg>
            </a>
        @endif
    @endauth
    <div class="row my-5">
        @foreach($secondnav->thirdnav as $thirdnav)
            <div class="col-12">
                <div class="my-2">
                    <h5>{{ __($thirdnav->title) }}</h5>
                    @if($thirdnav->link)
                        <a class="" href="{{__($thirdnav->link) }}" target="_blank"><p class="bg-secondary rounded p-2 my-3">{{__($thirdnav->link) }} </p></a>
                    @endif
                </div>
                @auth
                    <div class="my-2 d-flex">
                        <a href="{{ route('thirdnavs.edit', ['thirdnav'=> $thirdnav->id])}}"class="btn btn-dark btn-sm col-1 p-2" >
                            <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </a>
                        <form action="{{ route('thirdnavs.destroy', ['thirdnav' => $thirdnav->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mx-3" onclick="return confirm('{{ $thirdnav->id}} O\'chirishni tasdiqlaysizmi?')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
            @if($thirdnav->pdf == null)
            @else
                <div id="pdfViewerContainer" class="mt-4">
                    <canvas id="pdfViewer" class="col-12"></canvas>
                </div>
                <div class="mt-5">
                    <button id="prevButton"><</button>
                    <span id="pageInfo"></span>
                    <button id="nextButton">></button>
                </div>
            @endif
        @endforeach
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <script>
        // PDF URL to load - Replace this with the URL of your PDF file
        const pdfUrl = "{{ asset('Storage/'. $thirdnav->pdf )}}";

        // PDF Viewer container and canvas element
        const container = document.getElementById('pdfViewerContainer');
        const canvas = document.getElementById('pdfViewer');
        const canvasContext = canvas.getContext('2d');

        // PDF variables
        let pdfDocument = null;
        let totalPages = 0;
        let currentPage = 1;

        // Asynchronous function to load and display the PDF
        async function loadAndRenderPDF() {
            // Load PDF document
            const loadingTask = pdfjsLib.getDocument(pdfUrl);
            pdfDocument = await loadingTask.promise;

            // Set the total number of pages in the document
            totalPages = pdfDocument.numPages;

            // Display the first page initially
            await renderPage(currentPage);

            // Update page info
            document.getElementById('pageInfo').textContent = `{{__('Sahifa ')}} ${currentPage} / ${totalPages}`;

            // Handle Previous button click
            document.getElementById('prevButton').addEventListener('click', async () => {
                if (currentPage > 1) {
                    currentPage--;
                    await renderPage(currentPage);
                }
            });

            // Handle Next button click
            document.getElementById('nextButton').addEventListener('click', async () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    await renderPage(currentPage);
                }
            });
        }

        // Asynchronous function to render a specific page
        async function renderPage(pageNumber) {
            const page = await pdfDocument.getPage(pageNumber);
            const viewport = page.getViewport({ scale: 1.5 });

            canvas.width = viewport.width;
            canvas.height = viewport.height;

            const renderContext = {
                canvasContext,
                viewport,
            };
            await page.render(renderContext);

            // Update page info
            document.getElementById('pageInfo').textContent = `{{__('Sahifa ')}} ${currentPage} / ${totalPages}`;
        }

        // Load and display the PDF when the page is loaded
        window.onload = loadAndRenderPDF;
    </script>
</div>
@endsection