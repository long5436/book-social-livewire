import "./bootstrap";

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
