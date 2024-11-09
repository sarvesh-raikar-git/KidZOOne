import cv2
import os
import torch
from transformers import CLIPProcessor, CLIPModel
from PIL import Image
import sys

# Load the pre-trained CLIP model and processor
model = CLIPModel.from_pretrained("openai/clip-vit-base-patch16")
processor = CLIPProcessor.from_pretrained("openai/clip-vit-base-patch16")
device = "cuda" if torch.cuda.is_available() else "cpu"
model.to(device)

def extract_frames(video_path, interval=5):
    frames = []
    cap = cv2.VideoCapture(video_path)
    fps = cap.get(cv2.CAP_PROP_FPS)
    interval_frames = int(fps * interval)

    frame_idx = 0
    while True:
        ret, frame = cap.read()
        if not ret:
            break
        if frame_idx % interval_frames == 0:
            frames.append(frame)
        frame_idx += 1

    cap.release()
    return frames

def analyze_frame(frame):
    image = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
    pil_image = Image.fromarray(image)
    inputs = processor(text=["safe", "harmful"], images=pil_image, return_tensors="pt", padding=True)
    inputs = {k: v.to(device) for k, v in inputs.items()}

    with torch.no_grad():
        outputs = model(**inputs)

    logits_per_image = outputs.logits_per_image
    probs = logits_per_image.softmax(dim=1)

    return probs

def process_video(video_path, interval=5):
    frames = extract_frames(video_path, interval)
    safe_count = 0
    harmful_count = 0

    for frame in frames:
        probs = analyze_frame(frame).cpu()  # Bring back to CPU if on GPU
        safe_prob = probs[0][0].item()
        harmful_prob = probs[0][1].item()

        if safe_prob > harmful_prob:
            safe_count += 1
        else:
            harmful_count += 1

    return "Safe" if safe_count > harmful_count else "Harmful"

if __name__ == "__main__":
    if len(sys.argv) > 1:
        video_path = sys.argv[1]
        classification = process_video(video_path)
        print(classification)  # Output only "Safe" or "Harmful"
    else:
        print("No video path provided.")
