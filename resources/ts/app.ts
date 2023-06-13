import "./bootstrap";
import { Editor } from "@tiptap/core";
import StarterKit from "@tiptap/starter-kit";

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const bookCommentBtns: NodeListOf<HTMLButtonElement> = $$(".book-comment-btn");
const bookCommentBlock: NodeListOf<HTMLDivElement> = $$(".book-comment-block");

if (bookCommentBtns) {
    bookCommentBtns.forEach((item: HTMLButtonElement, index: number) => {
        item.addEventListener("click", (e: MouseEvent) => {
            // const currentShowForm: HTMLDivElement | null = document.querySelector(".book-comment-block:not(.hidden)");

            // if (currentShowForm && currentShowForm != bookCommentBlock[index]) {
            //     currentShowForm.classList.add("hidden");
            // }
            bookCommentBlock[index].classList.toggle("hidden");
        });
    });
}

window.setupEditor = function (content) {
    let editor;

    return {
        content: content,

        init(element) {
            editor = new Editor({
                element: element,
                extensions: [StarterKit],
                content: this.content,
                onUpdate: ({ editor }) => {
                    this.content = editor.getHTML();
                },
            });

            this.$watch("content", (content) => {
                // If the new content matches TipTap's then we just skip.
                if (content === editor.getHTML()) return;

                /*
          Otherwise, it means that a force external to TipTap
          is modifying the data on this Alpine component,
          which could be Livewire itself.
          In this case, we just need to update TipTap's
          content and we're good to do.
          For more information on the `setContent()` method, see:
            https://www.tiptap.dev/api/commands/set-content
        */
                editor.commands.setContent(content, false);
            });
        },
    };
};
