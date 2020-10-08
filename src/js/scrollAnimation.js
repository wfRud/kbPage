window.sr = new ScrollReveal();

sr.reveal("header", {
  duration: 1500,
  scale: 1,
  delay: 1000,
});
sr.reveal("#slider", {
  duration: 1500,
  scale: 1,
  delay: 1200,
});

sr.reveal("#about .lyrics", {
  duration: 800,
  distance: "100%",
  origin: "left",
  viewFactor: 0.35,
});
sr.reveal("#about .image", {
  duration: 800,
  distance: "100%",
  origin: "right",
  viewFactor: 0.35,
});

sr.reveal("#graphic .lyrics", {
  duration: 1500,
  distance: "100%",
  origin: "right",
});

sr.reveal("#graphic .image img", {
  delay: 300,
  duration: 500,
  interval: 200,
});
sr.reveal("#drawing .lyrics", {
  duration: 1500,
  distance: "100%",
  origin: "left",
});

sr.reveal("#drawing .image img", {
  delay: 300,
  duration: 500,
  interval: 200,
});

sr.reveal("#gallery .gallery-item", {
  delay: 1000,
  interval: 200,
});
