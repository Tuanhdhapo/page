<div class="container-fluid document-container">
    <div class="row">
        <div class="col-lg-12 title-documents">
            <p>Program</p>
        </div>
        @foreach ($documents as $item)
        <div class="col-lg-12">
            <hr>
            <div class="row">
                <div class="col-lg-1 pr-0 type-file-container align-self-center">
                    <img class="pdf" @if ($item->type == 'pdf')
                    src="{{ asset('images/pdf.png') }}" alt="pdf"
                    @elseif ($item->type == 'docx')
                    src="{{ asset('images/doc.png') }}" alt="docx"
                        @elseif ($item->type == 'mp4')
                    src="{{ asset('images/video.png') }}" alt="docx"
                    @endif>
                </div>
                <div class="col-lg-3 pl-0 name-file-container align-self-center">
                    <a href="" class="title">{{ $item->description }}</a>
                </div>
                <div class="col-lg-8 button-preview-container text-right align-self-center">
                    <a href="{{ url('view', $item->id) }}" data-id="{{ $item->id }}" class="btn-preview"
                        target="_blank" rel="noopener norefer">
                        @foreach ($documentsLearned as $dcm)
                        @if ($dcm->document_id == $item->id)
                            Learned
                        @endif
                        @endforeach
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
