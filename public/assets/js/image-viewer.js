setTimeout(() => {
  // View an image.
  const viewer = new Viewer(document.getElementById("image-viewer"), {
    inline: true,
    viewed() {
      viewer.zoomTo(1);
    },
  });
  // Then, show the image by clicking it, or call `viewer.show()`.

  // View a list of images.
  // Note: All images within the container will be found by calling `element.querySelectorAll('img')`.
  const gallery = new Viewer(document.getElementById("vtuber-slider"));
  // Then, show one image by click it, or call `gallery.show()`.
}, 1500);
