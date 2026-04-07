@extends('laravel-usp-theme::master')

@section('content')
    <style>
        .ck-editor__main {
            padding: 80px 60px;

        }
        .ck-editor__editable_inline {
            max-width: clamp(794px, 60vw, 1280px);
            min-height: 1123px;   /* altura proporcional */
            margin: 0 auto;
        }
        .main-container {     /* largura A4 */
            padding: 80px 60px;
        }
        .ck.ck-editor__top .ck-sticky-panel .ck-sticky-panel__content {
            border-bottom-width: 1px;
        }
    </style>
    <div class="main-container">
        <div class="editor-container editor-container_classic-editor editor-container_include-style editor-container_include-fullscreen">
            <div class="editor-container__editor"><div id="editor"></div></div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/48.0.0/ckeditor5.umd.js" crossorigin></script>
    <script>
        const {
            ClassicEditor,
            Autosave,
            Essentials,
            Paragraph,
            Autoformat,
            TextTransformation,
            LinkImage,
            Link,
            ImageBlock,
            ImageToolbar,
            BlockQuote,
            Bold,
            ImageInsertViaUrl,
            AutoImage,
            Table,
            TableToolbar,
            Emoji,
            Mention,
            Heading,
            ImageTextAlternative,
            ImageCaption,
            ImageStyle,
            Indent,
            IndentBlock,
            ImageInline,
            Italic,
            List,
            MediaEmbed,
            TableCaption,
            TodoList,
            Underline,
            Fullscreen,
            Markdown,
            Strikethrough,
            Code,
            Subscript,
            Superscript,
            FontBackgroundColor,
            FontColor,
            FontFamily,
            FontSize,
            Highlight,
            HorizontalLine,
            CodeBlock,
            Alignment,
            Style,
            GeneralHtmlSupport,
            PlainTableOutput,
            Title,
            BalloonToolbar
        } = window.CKEDITOR;

        const LICENSE_KEY =
            'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NzU2OTI3OTksImp0aSI6IjIyYzZlMDAzLWM3ODUtNGI5YS1hZGNkLTkyM2VlMjUzYzExMiIsImxpY2Vuc2VkSG9zdHMiOlsiKi53ZWJjb250YWluZXIuaW8iLCIqLmpzaGVsbC5uZXQiLCIqLmNzcC5hcHAiLCJjZHBuLmlvIiwiMTI3LjAuMC4xIiwibG9jYWxob3N0IiwiMTkyLjE2OC4qLioiLCIxMC4qLiouKiIsIjE3Mi4qLiouKiIsIioudGVzdCIsIioubG9jYWxob3N0IiwiKi5sb2NhbCJdLCJkaXN0cmlidXRpb25DaGFubmVsIjpbImNsb3VkIiwiZHJ1cGFsIiwic2giXSwibGljZW5zZVR5cGUiOiJldmFsdWF0aW9uIiwidmMiOiIzZmQwZGU2OSJ9.DZWNUmnKAdMIRfUltr2tgAdAgBrV4tf9ZXbqB-ZDMrJhG9PAg0SZwiDdVBZckQs-QduCAvfSY74cHJowdJTrqQ';

        const editorConfig = {
            attachTo: document.querySelector('#editor'),
            root: {
                placeholder: 'Type or paste your content here!',
                initialData: 'Teste'
            },
            toolbar: {
                items: [
                    'undo',
                    'redo',
                    '|',
                    'fullscreen',
                    '|',
                    'heading',
                    'style',
                    '|',
                    'fontSize',
                    'fontFamily',
                    'fontColor',
                    'fontBackgroundColor',
                    '|',
                    'bold',
                    'italic',
                    'underline',
                    'strikethrough',
                    'subscript',
                    'superscript',
                    'code',
                    '|',
                    'emoji',
                    'horizontalLine',
                    'link',
                    'insertImageViaUrl',
                    'mediaEmbed',
                    'insertTable',
                    'highlight',
                    'blockQuote',
                    'codeBlock',
                    '|',
                    'alignment',
                    '|',
                    'bulletedList',
                    'numberedList',
                    'todoList',
                    'outdent',
                    'indent'
                ],
                shouldNotGroupWhenFull: false
            },
            plugins: [
                Alignment,
                Autoformat,
                AutoImage,
                Autosave,
                BalloonToolbar,
                BlockQuote,
                Bold,
                Code,
                CodeBlock,
                Emoji,
                Essentials,
                FontBackgroundColor,
                FontColor,
                FontFamily,
                FontSize,
                Fullscreen,
                GeneralHtmlSupport,
                Heading,
                Highlight,
                HorizontalLine,
                ImageBlock,
                ImageCaption,
                ImageInline,
                ImageInsertViaUrl,
                ImageStyle,
                ImageTextAlternative,
                ImageToolbar,
                Indent,
                IndentBlock,
                Italic,
                Link,
                LinkImage,
                List,
                Markdown,
                MediaEmbed,
                Mention,
                Paragraph,
                PlainTableOutput,
                Strikethrough,
                Style,
                Subscript,
                Superscript,
                Table,
                TableCaption,
                TableToolbar,
                TextTransformation,
                Title,
                TodoList,
                Underline
            ],
            licenseKey: LICENSE_KEY,
            balloonToolbar: ['bold', 'italic', '|', 'link', '|', 'bulletedList', 'numberedList'],
            fontFamily: {
                supportAllValues: true
            },
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },
            fullscreen: {
                onEnterCallback: container =>
                    container.classList.add(
                        'editor-container',
                        'editor-container_classic-editor',
                        'editor-container_include-style',
                        'editor-container_include-fullscreen',
                        'main-container'
                    )
            },
            heading: {
                options: [
                    {
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    },
                    {
                        model: 'heading5',
                        view: 'h5',
                        title: 'Heading 5',
                        class: 'ck-heading_heading5'
                    },
                    {
                        model: 'heading6',
                        view: 'h6',
                        title: 'Heading 6',
                        class: 'ck-heading_heading6'
                    }
                ]
            },
            htmlSupport: {
                allow: [
                    {
                        name: /^.*$/,
                        styles: true,
                        attributes: true,
                        classes: true
                    }
                ]
            },
            image: {
                toolbar: ['toggleImageCaption', 'imageTextAlternative', '|', 'imageStyle:inline', 'imageStyle:wrapText', 'imageStyle:breakText']
            },
            link: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                decorators: {
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            mention: {
                feeds: [
                    {
                        marker: '@',
                        feed: [
                            /* See: https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html */
                        ]
                    }
                ]
            },
            style: {
                definitions: [
                    {
                        name: 'Article category',
                        element: 'h3',
                        classes: ['category']
                    },
                    {
                        name: 'Title',
                        element: 'h2',
                        classes: ['document-title']
                    },
                    {
                        name: 'Subtitle',
                        element: 'h3',
                        classes: ['document-subtitle']
                    },
                    {
                        name: 'Info box',
                        element: 'p',
                        classes: ['info-box']
                    },
                    {
                        name: 'CTA Link Primary',
                        element: 'a',
                        classes: ['button', 'button--green']
                    },
                    {
                        name: 'CTA Link Secondary',
                        element: 'a',
                        classes: ['button', 'button--black']
                    },
                    {
                        name: 'Marker',
                        element: 'span',
                        classes: ['marker']
                    },
                    {
                        name: 'Spoiler',
                        element: 'span',
                        classes: ['spoiler']
                    }
                ]
            },
            table: {
                contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
            }
        };

        ClassicEditor.create(editorConfig);
    </script>
@endsection('content')

