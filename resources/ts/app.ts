import "./bootstrap";

const bookCommentBtns: NodeListOf<HTMLButtonElement> = document.querySelectorAll(".book-comment-btn");
const bookCommentBlock: NodeListOf<HTMLDivElement> = document.querySelectorAll(".book-comment-block");

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
